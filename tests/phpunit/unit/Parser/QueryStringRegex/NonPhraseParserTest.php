<?php

namespace CirrusSearch\Parser\QueryStringRegex;

use CirrusSearch\CirrusTestCase;
use CirrusSearch\Parser\AST\NegatedNode;
use CirrusSearch\Parser\AST\WordsQueryNode;
use CirrusSearch\Search\Escaper;

/**
 * @covers \CirrusSearch\Parser\QueryStringRegex\NonPhraseParser
 * @group CirrusSearch
 */
class NonPhraseParserTest extends CirrusTestCase {
	/**
	 * @dataProvider provideWordQueries
	 */
	public function testWord( $query, $start, $end, $expected ) {
		if ( $end === -1 ) {
			$end = strlen( $query );
		}
		$parser = new NonPhraseParser( new Escaper( 'en', false ) );
		$nodes = $parser->parse( $query, $start, $end );
		$this->assertEquals( $expected, $nodes );
	}

	public function provideWordQueries() {
		return [
			'simple' => [
				'this is just"something"',
				0, -1,
				new WordsQueryNode( 0,
					strlen( 'this' ),
					'this' )
			],
			'negated phrase (bis)' => [
				'just-"something"',
				0, -1,
				new WordsQueryNode( 0,
					strlen( 'just' ),
					'just' )
			],
			'collapsed' => [
				'just"something"',
				0, -1,
				new WordsQueryNode( 0,
					strlen( 'just' ),
					'just' )
			],
			'collapsed negation' => [
				'just!"something"',
				0, -1,
				new WordsQueryNode( 0,
					strlen( 'just' ),
					'just' )
			],
			'escaped quote phrase' => [
				'just\\"something"',
				0, -1,
				new WordsQueryNode( 0,
					strlen( 'just\\"something' ),
					'just"something' )
			],
			'escaped negation' => [
				'just\\!"something"',
				0, -1,
				new WordsQueryNode( 0,
					strlen( 'just !' ),
					'just!' )
			],
			'escaped negation (bis)' => [
				'just\\-"something"',
				0, -1,
				new WordsQueryNode( 0,
					strlen( 'just\\-' ),
					'just-' )
			],
			'escape escape sequence and negation' => [
				'just\\\\!"something"',
				0, -1,
				new WordsQueryNode( 0,
					strlen( 'just\\\\' ),
					'just\\' )
			],
			'escape escape sequence and negation (bis)' => [
				'just\\\\-"something"',
				0, -1,
				new WordsQueryNode( 0,
					strlen( 'just\\\\' ),
					'just\\' )
			],
			'ends with dash' => [
				'just-',
				0, -1,
				new WordsQueryNode( 0,
					strlen( 'just-' ),
					'just-' )
			],
			'ends with excl' => [
				'just!',
				0, -1,
				new WordsQueryNode( 0,
					strlen( 'just!' ),
					'just!' )
			],
			'ends with escape sequence' => [
				'just\\',
				0, -1,
				new WordsQueryNode( 0,
					strlen( 'just\\' ),
					'just\\' )
			],
			'ends with ! and escaped dquotes' => [
				'just!\\"',
				0, -1,
				new WordsQueryNode( 0,
					strlen( 'just!\\"' ),
					'just!"' )
			],
			'ends with double escape and dquotes' => [
				'just\\\\"',
				0, -1,
				new WordsQueryNode( 0,
					strlen( 'just\\\\' ),
					'just\\' )
			],
			'escaped double dquotes' => [
				'just\"b',
				0, -1,
				new WordsQueryNode( 0,
					strlen( 'just\"b' ),
					'just"b'
				)
			],
			'starts with phrase' => [
				'"hello"',
				0, -1,
				null
			],
			'starts with negated phrase' => [
				'-"hello"',
				0, -1,
				null
			],
			'negation needs to precede a letter, a number or a _' => [
				'-@hello"',
				0, -1,
				new WordsQueryNode( 0,
					strlen( '-@hello' ),
					'-@hello'
				)
			],
			'negation (! version) needs to precede a letter, a number or a _' => [
				'!@hello"',
				0, -1,
				new WordsQueryNode( 0,
					strlen( '!@hello' ),
					'!@hello'
				)
			],
			'negation alone is a word' => [
				'-',
				0, -1,
				new WordsQueryNode( 0,
					strlen( '-' ),
					'-'
				)
			],
			'negation (! version) alone is a word' => [
				'!',
				0, -1,
				new WordsQueryNode( 0,
					strlen( '!' ),
					'!'
				)
			],
			'negation with dash' => [
				'-test',
				0, -1,
				new NegatedNode( 0,
					strlen( '-test' ),
					new WordsQueryNode( 1,
						strlen( '-test' ),
						'test'
					),
					'-'
				)
			],
			'negation with dash and non ascii' => [
				'-çà',
				0, -1,
				new NegatedNode( 0,
					strlen( '-çà' ),
					new WordsQueryNode( 1,
						strlen( '-çà' ),
						'çà'
					),
					'-'
				)
			],
			'negation with dash and number' => [
				'-11',
				0, -1,
				new NegatedNode( 0,
					strlen( '-11' ),
					new WordsQueryNode( 1,
						strlen( '-11' ),
						'11'
					),
					'-'
				)
			],
			'negation with excl' => [
				'!test',
				0, -1,
				new NegatedNode( 0,
					strlen( '!test' ),
					new WordsQueryNode( 1,
						strlen( '!test' ),
						'test'
					),
					'!'
				)
			],
			'stop early' => [
				'this\ intitle:test',
				0, strlen( 'this\ ' ),
				new WordsQueryNode( 0,
					strlen( 'this\ ' ),
					'this '
				)
			],
		];
	}

	public function testPathologicalQuery() {
		$q = str_repeat( "a-a!a\\!\\\"", 1000 );
		$expected = substr( str_repeat( "a-a!a!\"", 1000 ), 2 );
		$parser = new NonPhraseParser( new Escaper( 'en', false ) );
		$node = $parser->parse( $q, 2, strlen( $q ) );
		$this->assertInstanceOf( WordsQueryNode::class, $node );
		/**
		 * @var WordsQueryNode $node
		 */
		$this->assertEquals( 2, $node->getStartOffset() );
		$this->assertEquals( $node->getEndOffset(), strlen( $q ) );
		$this->assertEquals( $node->getWords(), $expected );
	}
}
