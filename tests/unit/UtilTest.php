<?php

namespace CirrusSearch;

use CirrusSearch\Test\HashSearchConfig;
use MediaWiki\MediaWikiServices;
use MediaWikiTestCase;
use Language;

/**
 * Test Util functions.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 */
class UtilTest extends MediaWikiTestCase {
	/**
	 * @dataProvider recursiveSameTestCases
	 */
	public function testRecursiveSame( $same, $lhs, $rhs ) {
		$this->assertEquals( $same, Util::recursiveSame( $lhs, $rhs ) );
	}

	public static function recursiveSameTestCases() {
		return [
			[ true, [], [] ],
			[ false, [ true ], [] ],
			[ false, [ true ], [ false ] ],
			[ true, [ true ], [ true ] ],
			[ false, [ 1 ], [ 2 ] ],
			[ false, [ 1, 2 ], [ 2, 1 ] ],
			[ true, [ 1, 2, 3 ], [ 1, 2, 3 ] ],
			[ false, [ [ 1 ] ], [ [ 2 ] ] ],
			[ true, [ [ 1 ] ], [ [ 1 ] ] ],
			[ true, [ 'candle' => [ 'wax' => 'foo' ] ], [ 'candle' => [ 'wax' => 'foo' ] ] ],
			[ false, [ 'candle' => [ 'wax' => 'foo' ] ], [ 'candle' => [ 'wax' => 'bar' ] ] ],
		];
	}

	/**
	 * @dataProvider cleanUnusedFieldsProvider
	 */
	public function testCleanUnusedFields( $data, $properties, $expect ) {
		$result = Util::cleanUnusedFields( $data, $properties );
		$this->assertArrayEquals( $result, $expect );
	}

	public static function cleanUnusedFieldsProvider() {
		return [
			// sample
			[
				// data
				[
					'title' => "I'm a title",
					'useless' => "I'm useless",
				],
				// properties
				[
					'title' => 'params-for-title'
				],
				// expect
				[
					'title' => "I'm a title",
				],
			],
			// Flow data - untouched
			[
				// data (as seen in https://gerrit.wikimedia.org/r/#/c/195889/1//COMMIT_MSG)
				[
					'namespace' => 1,
					'namespace_text' => "Talk",
					'pageid' => 2,
					'title' => "Main Page",
					'timestamp' => "2014-02-07T01:42:57Z",
					'update_timestamp' => "2014-02-25T14:12:40Z",
					'revisions' => [
						[
							'id' => "rpvwvywl9po7ih77",
							'text' => "topic title content",
							'source_text' => "topic title content",
							'moderation_state' => "",
							'timestamp' => "2014-02-07T01:42:57Z",
							'update_timestamp' => "2014-02-07T01:42:57Z",
							'type' => "topic"
						],
						[
							'id' => "ropuzninqgyf19ko",
							'text' => "reply content",
							'source_text' => "reply '''content'''",
							'moderation_state' => "hide",
							'timestamp' => "2014-02-25T14:12:40Z",
							'update_timestamp' => "2014-02-25T14:12:40Z",
							'type' => "post"
						],
					]
				],
				// properties (as seen in https://gerrit.wikimedia.org/r/#/c/161251/26/includes/Search/maintenance/MappingConfigBuilder.php)
				[
					'namespace' => [ '...' ],
					'namespace_text' => [ '...' ],
					'pageid' => [ '...' ],
					'title' => [ '...' ],
					'timestamp' => [ '...' ],
					'update_timestamp' => [ '...' ],
					'revisions' => [
						'properties' => [
							'id' => [ '...' ],
							'text' => [ '...' ],
							'source_text' => [ '...' ],
							'moderation_state' => [ '...' ],
							'timestamp' => [ '...' ],
							'update_timestamp' => [ '...' ],
							'type' => [ '...' ],
						]
					],
				],
				// expect
				[
					'namespace' => 1,
					'namespace_text' => "Talk",
					'pageid' => 2,
					'title' => "Main Page",
					'timestamp' => "2014-02-07T01:42:57Z",
					'update_timestamp' => "2014-02-25T14:12:40Z",
					'revisions' => [
						[
							'id' => "rpvwvywl9po7ih77",
							'text' => "topic title content",
							'source_text' => "topic title content",
							'moderation_state' => "",
							'timestamp' => "2014-02-07T01:42:57Z",
							'update_timestamp' => "2014-02-07T01:42:57Z",
							'type' => "topic"
						],
						[
							'id' => "ropuzninqgyf19ko",
							'text' => "reply content",
							'source_text' => "reply '''content'''",
							'moderation_state' => "hide",
							'timestamp' => "2014-02-25T14:12:40Z",
							'update_timestamp' => "2014-02-25T14:12:40Z",
							'type' => "post"
						],
					]
				],
			],
			// Flow data - deleted columns in config
			[
				// data (as seen in https://gerrit.wikimedia.org/r/#/c/195889/1//COMMIT_MSG)
				[
					'namespace' => 1,
					'namespace_text' => "Talk",
					'pageid' => 2,
					'title' => "Main Page",
					'timestamp' => "2014-02-07T01:42:57Z",
					'update_timestamp' => "2014-02-25T14:12:40Z",
					'revisions' => [
						[
							'id' => "rpvwvywl9po7ih77",
							'text' => "topic title content",
							'source_text' => "topic title content",
							'moderation_state' => "",
							'timestamp' => "2014-02-07T01:42:57Z",
							'update_timestamp' => "2014-02-07T01:42:57Z",
							'type' => "topic"
						],
						[
							'id' => "ropuzninqgyf19ko",
							'text' => "reply content",
							'source_text' => "reply '''content'''",
							'moderation_state' => "hide",
							'timestamp' => "2014-02-25T14:12:40Z",
							'update_timestamp' => "2014-02-25T14:12:40Z",
							'type' => "post"
						],
					]
				],
				// properties (as seen in https://gerrit.wikimedia.org/r/#/c/161251/26/includes/Search/maintenance/MappingConfigBuilder.php)
				[
					'namespace' => [ '...' ],
					'namespace_text' => [ '...' ],
					'pageid' => [ '...' ],
					'title' => [ '...' ],
					// deleted timestamp & update_timestamp columns
					'revisions' => [
						'properties' => [
							'id' => [ '...' ],
							'text' => [ '...' ],
							'source_text' => [ '...' ],
							'moderation_state' => [ '...' ],
							// deleted timestamp & update_timestamp columns
							'type' => [ '...' ],
						]
					],
				],
				// expect
				[
					'namespace' => 1,
					'namespace_text' => "Talk",
					'pageid' => 2,
					'title' => "Main Page",
					// deleted timestamp & update_timestamp columns
					'revisions' => [
						[
							'id' => "rpvwvywl9po7ih77",
							'text' => "topic title content",
							'source_text' => "topic title content",
							'moderation_state' => "",
							// deleted timestamp & update_timestamp columns
							'type' => "topic"
						],
						[
							'id' => "ropuzninqgyf19ko",
							'text' => "reply content",
							'source_text' => "reply '''content'''",
							'moderation_state' => "hide",
							// deleted timestamp & update_timestamp columns
							'type' => "post"
						],
					]
				],
			],
		];
	}

	public function testChooseBestRedirect() {
		$convert = function( $x ) {
			$redirect = [];
			foreach( $x as $t ) {
				$redirect[] = [ 'title' => $t, 'namespace' => 0 ];
			}
			return $redirect;
		};
		$input = $convert( [ 'Al. Einstein', 'Albert Einstein', 'A. Einstein', 'Einstein, Albert' ] );
		$this->assertEquals( 'Al. Einstein', Util::chooseBestRedirect( 'a', $input ) );
		$this->assertEquals( 'Al. Einstein', Util::chooseBestRedirect( 'al', $input ) );
		$this->assertEquals( 'Albert Einstein', Util::chooseBestRedirect( 'albet', $input ) );
		$this->assertEquals( 'Einstein, Albert', Util::chooseBestRedirect( 'Einstein', $input ) );
		$this->assertEquals( 'Einstein, Albert', Util::chooseBestRedirect( 'Ens', $input ) );
	}

	public function teststripQuestionMarks() {
		// tests are input, strippingLevel, expectedOutput
		$tests = [ [ 'pickles', 'all', 'pickles' ],
				   [ 'pic?les', 'all', 'pic les' ],
				   [ 'pic?les', 'break', 'pic?les' ],
				   [ 'pic?les', 'no', 'pic?les' ],
				   [ 'pic?les', 'final', 'pic?les' ],
				   [ 'pickle?', 'all', 'pickle ' ],
				   [ 'pickle?', 'break', 'pickle' ],
				   [ 'მწნილი?', 'no', 'მწნილი?' ],
				   [ 'მწნილი?', 'final', 'მწნილი' ],
				   [ '?漬物', 'all', ' 漬物' ],
				   [ '?漬物', 'break', '?漬物' ],
				   [ 'pic? les', 'all', 'pic  les' ],
				   [ 'pic? les', 'break', 'pic les' ],
				   [ 'pic\?les', 'all', 'pic?les' ],
				   [ 'pic\?les', 'break', 'pic?les' ],
				   [ 'pic\?les', 'no', 'pic\?les' ],
				   [ 'pic\?les', 'final', 'pic?les' ],
				   [ 'insource:/x?/', 'all', 'insource:/x?/' ],
				   [ 'insource:/x?/', 'break', 'insource:/x?/' ],
				   [ 'insource:/x?/', 'no', 'insource:/x?/' ],
				   [ 'insource:/x?/', 'final', 'insource:/x?/' ],
				   [ '??', 'all', '??' ],
				   [ '¿.; ?', 'all', '¿.; ?' ],
				];

		foreach ( $tests as $test ) {
			$this->assertEquals( Util::stripQuestionMarks( $test[0], $test[1] ), $test[2] );
		}
	}

	/**
	 * Produces mock message cache for injecting messages
	 * @return MessageCache
	 */
	private function getMockCache() {
		$mock = $this->getMockBuilder( 'MessageCache' )->disableOriginalConstructor()->getMock();
		$mock->method( 'get' )->willReturnCallback( function ( $key, $useDB, Language $lang ) {
			return "This is $key in {$lang->getCode()}|100%";
		} );
		return $mock;
	}

	/**
	 * Set message cache instance to given object.
	 * TODO: we wouldn't have to do this if we had some proper way to mock message cache.
	 * @param $class
	 * @param $var
	 * @param $value
	 */
	private function setPrivateVar( $class, $var, $value ) {
		// nasty hack - reset message cache instance
		$mc = new \ReflectionClass( $class );
		$mcInstance = $mc->getProperty( $var );
		$mcInstance->setAccessible( true );
		$mcInstance->setValue( $value );
	}

	/**
	 * Create test hash config for a wiki.
	 * @param string $wiki
	 * @param mixed[] $moreData additional config
	 * @return HashSearchConfig
	 */
	private function getHashConfig( $wiki, array $moreData = array() ) {
		if ( !isset( $moreData['CirrusSearchBoostTemplates'] ) ) {
			$moreData['CirrusSearchBoostTemplates'] = [];
		}
		if ( !isset( $moreData['CirrusSearchIgnoreOnWikiBoostTemplates'] ) ) {
			$moreData['CirrusSearchIgnoreOnWikiBoostTemplates'] = false;
		}
		$moreData[ '_wikiID' ] = $wiki;
		$config = new HashSearchConfig( $moreData );
		return $config;
	}

	/**
	 * Put data for a wiki into test cache.
	 * @param \BagOStuff $cache
	 * @param            $wiki
	 */
	private function putDataIntoCache( \BagOStuff $cache, $wiki ) {
		$key = $cache->makeGlobalKey( 'cirrussearch-boost-templates', $wiki );
		$cache->set( $key, ["Data for $wiki" => 2] );
	}

	/**
	 * Create test local cache
	 * @return \BagOStuff
	 */
	private function makeLocalCache() {
		$this->setMwGlobals( [
			'wgMainCacheType' => 'UtilTest',
			'wgObjectCaches' => [ 'UtilTest' => [ 'class' => \HashBagOStuff::class ] ]
		] );
		$services = \MediaWiki\MediaWikiServices::getInstance();
		if ( method_exists( $services, 'getLocalClusterObjectCache' ) ) {
			$services->resetServiceForTesting( 'LocalClusterObjectCache' );
			$services->redefineService( 'LocalClusterObjectCache', function () {
				return new \HashBagOStuff();
			} );
		}

		return \ObjectCache::getLocalClusterInstance();
	}

	/**
	 * @covers Utils::getDefaultBoostTemplates
	 */
	public function testgetDefaultBoostTemplates() {
		$cache = $this->makeLocalCache();
		$this->putDataIntoCache( $cache, 'ruwiki' );
		$this->putDataIntoCache( $cache, 'cywiki' );

		$cy = Util::getDefaultBoostTemplates( $this->getHashConfig( 'cywiki' ) );
		$ru = Util::getDefaultBoostTemplates( $this->getHashConfig( 'ruwiki' ) );

		$this->assertNotEquals( $cy, $ru, 'Boosts should change with language' );

		// no cache means empty array
		$this->assertArrayEquals( [ ],
			Util::getDefaultBoostTemplates( $this->getHashConfig( 'hywiki' ) ) );

	}

	/**
	 * @covers Utils::getDefaultBoostTemplates
	 */
	public function testCustomizeBoostTemplatesByConfig() {
		$configValues = [
			'CirrusSearchBoostTemplates' => [
				'Featured' => 2,
			],
		];
		$config = $this->getHashConfig( 'ruwiki', $configValues );
		$ru = Util::getDefaultBoostTemplates( $config );
		$this->assertArrayEquals( $configValues['CirrusSearchBoostTemplates'], $ru );
	}

	/**
	 * @covers Utils::getDefaultBoostTemplates
	 */
	public function testOverrideBoostTemplatesWithOnWikiConfig() {
		$configValues = [
			'CirrusSearchBoostTemplates' => [
				'Featured' => 2,
			],
		];
		$config = $this->getHashConfig( 'ruwiki', $configValues );

		// On wiki config should override config templates
		$cache = $this->makeLocalCache();
		$this->putDataIntoCache( $cache, 'ruwiki' );
		$ru = Util::getDefaultBoostTemplates( $config );
		$this->assertNotEquals( $configValues['CirrusSearchBoostTemplates'], $ru );
	}

	/**
	 * @covers Utils::getDefaultBoostTemplates
	 */
	public function testOverrideBoostTemplatesWithOnCurrentWikiConfig() {
		$configValues = [
			'CirrusSearchBoostTemplates' => [
				'Featured' => 2,
			],
		];
		$config = $this->getHashConfig( wfWikiID(), $configValues );

		// On wiki config should override config templates
		$cache = $this->makeLocalCache();
		$this->putDataIntoCache( $cache, wfWikiID() );

		$ru = Util::getDefaultBoostTemplates( $config );
		$this->assertNotEquals( $configValues['CirrusSearchBoostTemplates'], $ru );
	}

	/**
	 * @covers Utils::getDefaultBoostTemplates
	 */
	public function testDisableOverrideBoostTemplatesWithOnWikiConfig() {
		$configValues = [
			'CirrusSearchBoostTemplates' => [
				'Featured' => 2,
			],
			// we can disable on wiki customization
			'CirrusSearchIgnoreOnWikiBoostTemplates' => true,
		];
		$config = $this->getHashConfig( 'ruwiki', $configValues );

		$cache = $this->makeLocalCache();
		$this->putDataIntoCache( $cache, 'ruwiki' );

		$ru = Util::getDefaultBoostTemplates( $this->getHashConfig( 'ruwiki' ) );
		$this->assertArrayEquals( $configValues['CirrusSearchBoostTemplates'], $ru );
	}

	public function testgetDefaultBoostTemplatesLocal() {
		global $wgContLang;
		$this->setPrivateVar( \MessageCache::class, 'instance', $this->getMockCache() );
		$this->setPrivateVar( Util::class, 'defaultBoostTemplates', null );

		$cache = $this->makeLocalCache();
		$config = $this->getHashConfig( wfWikiID() );
		$key = $cache->makeGlobalKey( 'cirrussearch-boost-templates', $config->getWikiId() );

		// FIXME: we cannot really test the default value for $config
		// with Util::getDefaultBoostTemplates(). It looks like
		// MediaWikiServices initializes the current wiki SearchConfig
		// when wfWikiID() == 'wiki' and then it's cached, the test
		// framework seems to update the wiki name to wiki-unittest_
		// making it impossible to test if we are running on the local
		// wiki.
		// resetting MediaWikiServices would be nice but it does not
		// seem to be trivial.
		$cur = Util::getDefaultBoostTemplates( $config );
		reset( $cur );
		$this->assertContains( ' in ' . $wgContLang->getCode(), key( $cur ) );

		// Check we cached it
		$cached = $cache->get( $key );
		$this->assertNotEmpty( $cached, 'Should cache the value' );
	}

	public function tearDown() {
		// reset cache so that our mock won't pollute other tests
		$this->setPrivateVar( \MessageCache::class, 'instance', null );
		$this->setPrivateVar( Util::class, 'defaultBoostTemplates', null );
		parent::tearDown();
	}
}
