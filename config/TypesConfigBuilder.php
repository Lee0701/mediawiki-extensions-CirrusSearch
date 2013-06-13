<?php
class TypesConfigBuilder {
	private $where;

	public function __construct($where) {
		$this->where = $where;
	}

	public function build() {
		$languageIndependentTypes = $this->indent( $this->buildLanguageIndependentTypes() );
		$languageDependentTypes = $this->indent( $this->buildLanguageDependentTypes() );
		return <<<XML
<types>
$languageIndependentTypes
$languageDependentTypes
	<fieldType name="prefix" class="solr.TextField">
		<analyzer type="index">
			<tokenizer class="solr.LowerCaseTokenizerFactory"/>
			<!-- Note that I set the maxGramSize to huge so we can match whole titles.  Bad idea? -->
			<filter class="solr.EdgeNGramFilterFactory" minGramSize="1" maxGramSize="10000" side="front"/>
		</analyzer>
		<analyzer type="query">
			<tokenizer class="solr.LowerCaseTokenizerFactory"/>
		</analyzer>
	</fieldType>
</types>
XML;
	}

	private function buildLanguageIndependentTypes() {
		return <<<XML
<fieldType name="long" class="solr.TrieLongField" precisionStep="0" />
<fieldType name="id" class="solr.StrField" />
XML;
	}

	private function buildLanguageDependentTypes() {
		global $wgLanguageCode;
		$types = <<<XML
<fieldType name="text_splitting" class="solr.TextField" autoGeneratePhraseQueries="true">
XML;
		switch ($wgLanguageCode) {
			case 'en':
				$this->copyRawConfigFile( 'lang/stopwords_en.txt' );
				$types .= <<<XML
	<analyzer type="index">
		<tokenizer class="solr.WhitespaceTokenizerFactory"/>
		<filter class="solr.StopFilterFactory"
			ignoreCase="true"
			words="lang/stopwords_en.txt"
			enablePositionIncrements="true"
			/>
		<filter class="solr.WordDelimiterFilterFactory"
			generateWordParts="1"
			generateNumberParts="1"
			catenateWords="1"
			catenateNumbers="1"
			catenateAll="0"
			splitOnCaseChange="1"/>
		<filter class="solr.LowerCaseFilterFactory"/>
		<filter class="solr.PorterStemFilterFactory"/>
	</analyzer>
	<analyzer type="query">
		<tokenizer class="solr.WhitespaceTokenizerFactory"/>
		<filter class="solr.StopFilterFactory"
			ignoreCase="true"
			words="lang/stopwords_en.txt"
			enablePositionIncrements="true"
			/>
		<filter class="solr.WordDelimiterFilterFactory"
			generateWordParts="1"
			generateNumberParts="1"
			catenateWords="0"
			catenateNumbers="0"
			catenateAll="0"
			splitOnCaseChange="1"/>
		<filter class="solr.LowerCaseFilterFactory"/>
		<filter class="solr.PorterStemFilterFactory"/>
	</analyzer>
XML;
				break;
			case 'ja':
				$this->copyRawConfigFile( 'lang/stoptags_ja.txt' );
				$this->copyRawConfigFile( 'lang/stopwords_ja.txt' );
				$types .= <<<XML
	<analyzer>
		<!-- Kuromoji Japanese morphological analyzer/tokenizer (JapaneseTokenizer) -->
		<tokenizer class="solr.JapaneseTokenizerFactory" mode="search"/>
		<!-- Reduces inflected verbs and adjectives to their base/dictionary forms (辞書形) -->
		<filter class="solr.JapaneseBaseFormFilterFactory"/>
		<!-- Removes tokens with certain part-of-speech tags -->
		<filter class="solr.JapanesePartOfSpeechStopFilterFactory" tags="lang/stoptags_ja.txt" enablePositionIncrements="true"/>
		<!-- Normalizes full-width romaji to half-width and half-width kana to full-width (Unicode NFKC subset) -->
		<filter class="solr.CJKWidthFilterFactory"/>
		<!-- Removes common tokens typically not useful for search, but have a negative effect on ranking -->
		<filter class="solr.StopFilterFactory" ignoreCase="true" words="lang/stopwords_ja.txt" enablePositionIncrements="true" />
		<!-- Normalizes common katakana spelling variations by removing any last long sound character (U+30FC) -->
		<filter class="solr.JapaneseKatakanaStemFilterFactory" minimumLength="4"/>
		<!-- Lower-cases romaji characters -->
		<filter class="solr.LowerCaseFilterFactory"/>
	</analyzer>
XML;
				break;
		}
		$types .= <<<XML
</fieldType>
XML;
		return $types;
	}

	private function indent( $source ) {
		return preg_replace( '/^/m', "\t", $source );
	}

	private function copyRawConfigFile( $path ) {
		$source = __DIR__ . '/copiedRaw/' . $path;
		$dest = $this->where . '/' . $path;
		wfMkdirParents( dirname( $dest ), 0755 );
		copy( $source, $dest );
	}
}
