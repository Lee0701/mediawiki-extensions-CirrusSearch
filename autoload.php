<?php
// This file is generated by scripts/gen-autoload.php, do not adjust manually
// @codingStandardsIgnoreFile
global $wgAutoloadClasses;

$wgAutoloadClasses += [
	'CirrusSearch' => __DIR__ . '/includes/CirrusSearch.php',
	'CirrusSearch\\Api\\ApiBase' => __DIR__ . '/includes/Api/ApiBase.php',
	'CirrusSearch\\Api\\ConfigDump' => __DIR__ . '/includes/Api/ConfigDump.php',
	'CirrusSearch\\Api\\FreezeWritesToCluster' => __DIR__ . '/includes/Api/FreezeWritesToCluster.php',
	'CirrusSearch\\Api\\MappingDump' => __DIR__ . '/includes/Api/MappingDump.php',
	'CirrusSearch\\Api\\SettingsDump' => __DIR__ . '/includes/Api/SettingsDump.php',
	'CirrusSearch\\Api\\SuggestIndex' => __DIR__ . '/includes/Api/SuggestIndex.php',
	'CirrusSearch\\BaseInterwikiResolver' => __DIR__ . '/includes/BaseInterwikiResolver.php',
	'CirrusSearch\\BaseRequestLog' => __DIR__ . '/includes/BaseRequestLog.php',
	'CirrusSearch\\BuildDocument\\Builder' => __DIR__ . '/includes/BuildDocument/Builder.php',
	'CirrusSearch\\BuildDocument\\Completion\\DefaultSortSuggestionsBuilder' => __DIR__ . '/includes/BuildDocument/Completion/DefaultSortSuggestionsBuilder.php',
	'CirrusSearch\\BuildDocument\\Completion\\ExtraSuggestionsBuilder' => __DIR__ . '/includes/BuildDocument/Completion/ExtraSuggestionsBuilder.php',
	'CirrusSearch\\BuildDocument\\Completion\\IncomingLinksScoringMethod' => __DIR__ . '/includes/BuildDocument/Completion/SuggestScoring.php',
	'CirrusSearch\\BuildDocument\\Completion\\NaiveSubphrasesSuggestionsBuilder' => __DIR__ . '/includes/BuildDocument/Completion/NaiveSubphrasesSuggestionsBuilder.php',
	'CirrusSearch\\BuildDocument\\Completion\\PQScore' => __DIR__ . '/includes/BuildDocument/Completion/SuggestScoring.php',
	'CirrusSearch\\BuildDocument\\Completion\\QualityScore' => __DIR__ . '/includes/BuildDocument/Completion/SuggestScoring.php',
	'CirrusSearch\\BuildDocument\\Completion\\SuggestBuilder' => __DIR__ . '/includes/BuildDocument/Completion/SuggestBuilder.php',
	'CirrusSearch\\BuildDocument\\Completion\\SuggestScoringMethod' => __DIR__ . '/includes/BuildDocument/Completion/SuggestScoring.php',
	'CirrusSearch\\BuildDocument\\Completion\\SuggestScoringMethodFactory' => __DIR__ . '/includes/BuildDocument/Completion/SuggestScoring.php',
	'CirrusSearch\\BuildDocument\\ParseBuilder' => __DIR__ . '/includes/BuildDocument/Builder.php',
	'CirrusSearch\\BuildDocument\\RedirectsAndIncomingLinks' => __DIR__ . '/includes/BuildDocument/RedirectsAndIncomingLinks.php',
	'CirrusSearch\\BulkUpdateRequestLog' => __DIR__ . '/includes/BulkUpdateRequestLog.php',
	'CirrusSearch\\CheckIndexes' => __DIR__ . '/maintenance/checkIndexes.php',
	'CirrusSearch\\CirrusConfigInterwikiResolver' => __DIR__ . '/includes/CirrusConfigInterwikiResolver.php',
	'CirrusSearch\\CirrusIsSetup' => __DIR__ . '/maintenance/cirrusNeedsToBeBuilt.php',
	'CirrusSearch\\CirrusTestCase' => __DIR__ . '/tests/unit/CirrusTestCase.php',
	'CirrusSearch\\ClusterSettings' => __DIR__ . '/includes/ClusterSettings.php',
	'CirrusSearch\\CompletionRequestLog' => __DIR__ . '/includes/CompletionRequestLog.php',
	'CirrusSearch\\CompletionSuggester' => __DIR__ . '/includes/CompletionSuggester.php',
	'CirrusSearch\\Connection' => __DIR__ . '/includes/Connection.php',
	'CirrusSearch\\CrossProjectBlockScorerProfiles' => __DIR__ . '/profiles/CrossProjectBlockScorerProfiles.php',
	'CirrusSearch\\DataSender' => __DIR__ . '/includes/DataSender.php',
	'CirrusSearch\\Dump' => __DIR__ . '/includes/Dump.php',
	'CirrusSearch\\ElasticaErrorHandler' => __DIR__ . '/includes/ElasticaErrorHandler.php',
	'CirrusSearch\\Elastica\\LtrQuery' => __DIR__ . '/includes/Elastica/LtrQuery.php',
	'CirrusSearch\\Elastica\\PooledHttp' => __DIR__ . '/includes/Elastica/PooledHttp.php',
	'CirrusSearch\\Elastica\\PooledHttps' => __DIR__ . '/includes/Elastica/PooledHttps.php',
	'CirrusSearch\\Elastica\\ReindexRequest' => __DIR__ . '/includes/Elastica/ReindexRequest.php',
	'CirrusSearch\\Elastica\\ReindexResponse' => __DIR__ . '/includes/Elastica/ReindexResponse.php',
	'CirrusSearch\\Elastica\\ReindexStatus' => __DIR__ . '/includes/Elastica/ReindexStatus.php',
	'CirrusSearch\\Elastica\\ReindexTask' => __DIR__ . '/includes/Elastica/ReindexTask.php',
	'CirrusSearch\\ElasticsearchIntermediary' => __DIR__ . '/includes/ElasticsearchIntermediary.php',
	'CirrusSearch\\EmptyInterwikiResolver' => __DIR__ . '/includes/EmptyInterwikiResolver.php',
	'CirrusSearch\\ExplainPrinter' => __DIR__ . '/includes/ExplainPrinter.php',
	'CirrusSearch\\Extra\\Query\\IdHashMod' => __DIR__ . '/includes/Extra/Query/IdHashMod.php',
	'CirrusSearch\\Extra\\Query\\SourceRegex' => __DIR__ . '/includes/Extra/Query/SourceRegex.php',
	'CirrusSearch\\Extra\\Query\\TokenCountRouter' => __DIR__ . '/includes/Extra/Query/TokenCountRouter.php',
	'CirrusSearch\\ForceSearchIndex' => __DIR__ . '/maintenance/forceSearchIndex.php',
	'CirrusSearch\\FullTextQueryBuilderProfiles' => __DIR__ . '/profiles/FullTextQueryBuilderProfiles.php',
	'CirrusSearch\\HTMLCompletionProfileSettings' => __DIR__ . '/includes/HTMLCompletionProfileSettings.php',
	'CirrusSearch\\HashSearchConfig' => __DIR__ . '/includes/HashSearchConfig.php',
	'CirrusSearch\\Hooks' => __DIR__ . '/includes/Hooks.php',
	'CirrusSearch\\InterwikiResolver' => __DIR__ . '/includes/InterwikiResolver.php',
	'CirrusSearch\\InterwikiResolverFactory' => __DIR__ . '/includes/InterwikiResolverFactory.php',
	'CirrusSearch\\InterwikiSearcher' => __DIR__ . '/includes/InterwikiSearcher.php',
	'CirrusSearch\\Iterator\\CallbackIterator' => __DIR__ . '/includes/iterator/CallbackIterator.php',
	'CirrusSearch\\Iterator\\IteratorDecorator' => __DIR__ . '/includes/iterator/IteratorDecorator.php',
	'CirrusSearch\\Job\\CheckerJob' => __DIR__ . '/includes/Job/CheckerJob.php',
	'CirrusSearch\\Job\\DeleteArchive' => __DIR__ . '/includes/Job/DeleteArchive.php',
	'CirrusSearch\\Job\\DeletePages' => __DIR__ . '/includes/Job/DeletePages.php',
	'CirrusSearch\\Job\\ElasticaWrite' => __DIR__ . '/includes/Job/ElasticaWrite.php',
	'CirrusSearch\\Job\\IncomingLinkCount' => __DIR__ . '/includes/Job/IncomingLinkCount.php',
	'CirrusSearch\\Job\\Job' => __DIR__ . '/includes/Job/Job.php',
	'CirrusSearch\\Job\\LinksUpdate' => __DIR__ . '/includes/Job/LinksUpdate.php',
	'CirrusSearch\\Job\\MassIndex' => __DIR__ . '/includes/Job/MassIndex.php',
	'CirrusSearch\\Job\\OtherIndex' => __DIR__ . '/includes/Job/OtherIndex.php',
	'CirrusSearch\\LanguageDetector\\Detector' => __DIR__ . '/includes/LanguageDetector/Detector.php',
	'CirrusSearch\\LanguageDetector\\ElasticSearch' => __DIR__ . '/includes/LanguageDetector/ElasticSearch.php',
	'CirrusSearch\\LanguageDetector\\HttpAccept' => __DIR__ . '/includes/LanguageDetector/HttpAccept.php',
	'CirrusSearch\\LanguageDetector\\TextCat' => __DIR__ . '/includes/LanguageDetector/TextCat.php',
	'CirrusSearch\\Maintenance\\AnalysisConfigBuilder' => __DIR__ . '/includes/Maintenance/AnalysisConfigBuilder.php',
	'CirrusSearch\\Maintenance\\ChunkBuilder' => __DIR__ . '/includes/Maintenance/ChunkBuilder.php',
	'CirrusSearch\\Maintenance\\ConfigUtils' => __DIR__ . '/includes/Maintenance/ConfigUtils.php',
	'CirrusSearch\\Maintenance\\CopySearchIndex' => __DIR__ . '/maintenance/copySearchIndex.php',
	'CirrusSearch\\Maintenance\\DumpIndex' => __DIR__ . '/maintenance/dumpIndex.php',
	'CirrusSearch\\Maintenance\\FreezeWritesToCluster' => __DIR__ . '/maintenance/freezeWritesToCluster.php',
	'CirrusSearch\\Maintenance\\IndexCreator' => __DIR__ . '/includes/Maintenance/IndexCreator.php',
	'CirrusSearch\\Maintenance\\IndexDumperException' => __DIR__ . '/maintenance/dumpIndex.php',
	'CirrusSearch\\Maintenance\\IndexNamespaces' => __DIR__ . '/maintenance/indexNamespaces.php',
	'CirrusSearch\\Maintenance\\Maintenance' => __DIR__ . '/includes/Maintenance/Maintenance.php',
	'CirrusSearch\\Maintenance\\MappingConfigBuilder' => __DIR__ . '/includes/Maintenance/MappingConfigBuilder.php',
	'CirrusSearch\\Maintenance\\MetaStoreIndex' => __DIR__ . '/includes/Maintenance/MetaStoreIndex.php',
	'CirrusSearch\\Maintenance\\Metastore' => __DIR__ . '/maintenance/metastore.php',
	'CirrusSearch\\Maintenance\\Reindexer' => __DIR__ . '/includes/Maintenance/Reindexer.php',
	'CirrusSearch\\Maintenance\\RunSearch' => __DIR__ . '/maintenance/runSearch.php',
	'CirrusSearch\\Maintenance\\SaneitizeJobs' => __DIR__ . '/maintenance/saneitizeJobs.php',
	'CirrusSearch\\Maintenance\\SuggesterAnalysisConfigBuilder' => __DIR__ . '/includes/Maintenance/SuggesterAnalysisConfigBuilder.php',
	'CirrusSearch\\Maintenance\\SuggesterMappingConfigBuilder' => __DIR__ . '/includes/Maintenance/SuggesterMappingConfigBuilder.php',
	'CirrusSearch\\Maintenance\\UpdateOneSearchIndexConfig' => __DIR__ . '/maintenance/updateOneSearchIndexConfig.php',
	'CirrusSearch\\Maintenance\\UpdateSearchIndexConfig' => __DIR__ . '/maintenance/updateSearchIndexConfig.php',
	'CirrusSearch\\Maintenance\\UpdateSuggesterIndex' => __DIR__ . '/maintenance/updateSuggesterIndex.php',
	'CirrusSearch\\Maintenance\\UpdateVersionIndex' => __DIR__ . '/maintenance/updateVersionIndex.php',
	'CirrusSearch\\Maintenance\\Validators\\AnalyzersValidator' => __DIR__ . '/includes/Maintenance/Validators/AnalyzersValidator.php',
	'CirrusSearch\\Maintenance\\Validators\\IndexAliasValidator' => __DIR__ . '/includes/Maintenance/Validators/IndexAliasValidator.php',
	'CirrusSearch\\Maintenance\\Validators\\IndexAllAliasValidator' => __DIR__ . '/includes/Maintenance/Validators/IndexAllAliasValidator.php',
	'CirrusSearch\\Maintenance\\Validators\\MappingValidator' => __DIR__ . '/includes/Maintenance/Validators/MappingValidator.php',
	'CirrusSearch\\Maintenance\\Validators\\MaxShardsPerNodeValidator' => __DIR__ . '/includes/Maintenance/Validators/MaxShardsPerNodeValidator.php',
	'CirrusSearch\\Maintenance\\Validators\\NumberOfShardsValidator' => __DIR__ . '/includes/Maintenance/Validators/NumberOfShardsValidator.php',
	'CirrusSearch\\Maintenance\\Validators\\ReplicaRangeValidator' => __DIR__ . '/includes/Maintenance/Validators/ReplicaRangeValidator.php',
	'CirrusSearch\\Maintenance\\Validators\\ShardAllocationValidator' => __DIR__ . '/includes/Maintenance/Validators/ShardAllocationValidator.php',
	'CirrusSearch\\Maintenance\\Validators\\SpecificAliasValidator' => __DIR__ . '/includes/Maintenance/Validators/SpecificAliasValidator.php',
	'CirrusSearch\\Maintenance\\Validators\\Validator' => __DIR__ . '/includes/Maintenance/Validators/Validator.php',
	'CirrusSearch\\MultiSearchRequestLog' => __DIR__ . '/includes/MultiSearchRequestLog.php',
	'CirrusSearch\\NearMatchPicker' => __DIR__ . '/includes/NearMatchPicker.php',
	'CirrusSearch\\OtherIndexes' => __DIR__ . '/includes/OtherIndexes.php',
	'CirrusSearch\\PhraseSuggesterProfiles' => __DIR__ . '/profiles/PhraseSuggesterProfiles.php',
	'CirrusSearch\\Query\\BaseSimpleKeywordFeatureTest' => __DIR__ . '/tests/unit/Query/BaseSimpleKeywordFeatureTest.php',
	'CirrusSearch\\Query\\BoostTemplatesFeature' => __DIR__ . '/includes/Query/BoostTemplatesFeature.php',
	'CirrusSearch\\Query\\CompSuggestQueryBuilder' => __DIR__ . '/includes/Query/CompSuggestQueryBuilder.php',
	'CirrusSearch\\Query\\ContentModelFeature' => __DIR__ . '/includes/Query/ContentModelFeature.php',
	'CirrusSearch\\Query\\CountContentWordsBuilder' => __DIR__ . '/includes/Query/CountContentWordsBuilder.php',
	'CirrusSearch\\Query\\FileNumericFeature' => __DIR__ . '/includes/Query/FileNumericFeature.php',
	'CirrusSearch\\Query\\FileTypeFeature' => __DIR__ . '/includes/Query/FileTypeFeature.php',
	'CirrusSearch\\Query\\FullTextQueryBuilder' => __DIR__ . '/includes/Query/FullTextQueryBuilder.php',
	'CirrusSearch\\Query\\FullTextQueryStringQueryBuilder' => __DIR__ . '/includes/Query/FullTextQueryStringQueryBuilder.php',
	'CirrusSearch\\Query\\FullTextSimpleMatchQueryBuilder' => __DIR__ . '/includes/Query/FullTextSimpleMatchQueryBuilder.php',
	'CirrusSearch\\Query\\HasTemplateFeature' => __DIR__ . '/includes/Query/HasTemplateFeature.php',
	'CirrusSearch\\Query\\InCategoryFeature' => __DIR__ . '/includes/Query/InCategoryFeature.php',
	'CirrusSearch\\Query\\InTitleFeature' => __DIR__ . '/includes/Query/InTitleFeature.php',
	'CirrusSearch\\Query\\KeywordFeature' => __DIR__ . '/includes/Query/KeywordFeature.php',
	'CirrusSearch\\Query\\LanguageFeature' => __DIR__ . '/includes/Query/LanguageFeature.php',
	'CirrusSearch\\Query\\LinksToFeature' => __DIR__ . '/includes/Query/LinksToFeature.php',
	'CirrusSearch\\Query\\LocalFeature' => __DIR__ . '/includes/Query/LocalFeature.php',
	'CirrusSearch\\Query\\MoreLikeFeature' => __DIR__ . '/includes/Query/MoreLikeFeature.php',
	'CirrusSearch\\Query\\NearMatchQueryBuilder' => __DIR__ . '/includes/Query/NearMatchQueryBuilder.php',
	'CirrusSearch\\Query\\PreferRecentFeature' => __DIR__ . '/includes/Query/PreferRecentFeature.php',
	'CirrusSearch\\Query\\PrefixFeature' => __DIR__ . '/includes/Query/PrefixFeature.php',
	'CirrusSearch\\Query\\PrefixSearchQueryBuilder' => __DIR__ . '/includes/Query/PrefixSearchQueryBuilder.php',
	'CirrusSearch\\Query\\QueryBuilderTraits' => __DIR__ . '/includes/Query/QueryBuilderTraits.php',
	'CirrusSearch\\Query\\QueryHelper' => __DIR__ . '/includes/Query/QueryHelper.php',
	'CirrusSearch\\Query\\RegexInSourceFeature' => __DIR__ . '/includes/Query/RegexInSourceFeature.php',
	'CirrusSearch\\Query\\SimpleInSourceFeature' => __DIR__ . '/includes/Query/SimpleInSourceFeature.php',
	'CirrusSearch\\Query\\SimpleKeywordFeature' => __DIR__ . '/includes/Query/SimpleKeywordFeature.php',
	'CirrusSearch\\Query\\SubPageOfFeature' => __DIR__ . '/includes/Query/SubPageOf.php',
	'CirrusSearch\\RequestLog' => __DIR__ . '/includes/RequestLog.php',
	'CirrusSearch\\RequestLogger' => __DIR__ . '/includes/RequestLogger.php',
	'CirrusSearch\\RescoreProfiles' => __DIR__ . '/profiles/RescoreProfiles.php',
	'CirrusSearch\\Saneitize' => __DIR__ . '/maintenance/saneitize.php',
	'CirrusSearch\\Sanity\\Checker' => __DIR__ . '/includes/Sanity/Checker.php',
	'CirrusSearch\\Sanity\\NoopRemediator' => __DIR__ . '/includes/Sanity/Remediator.php',
	'CirrusSearch\\Sanity\\PrintingRemediator' => __DIR__ . '/includes/Sanity/Remediator.php',
	'CirrusSearch\\Sanity\\QueueingRemediator' => __DIR__ . '/includes/Sanity/QueueingRemediator.php',
	'CirrusSearch\\Sanity\\Remediator' => __DIR__ . '/includes/Sanity/Remediator.php',
	'CirrusSearch\\SearchConfig' => __DIR__ . '/includes/SearchConfig.php',
	'CirrusSearch\\SearchRequestLog' => __DIR__ . '/includes/SearchRequestLog.php',
	'CirrusSearch\\Search\\BaseResultsType' => __DIR__ . '/includes/Search/ResultsType.php',
	'CirrusSearch\\Search\\BooleanIndexField' => __DIR__ . '/includes/Search/BooleanIndexField.php',
	'CirrusSearch\\Search\\BoostTemplatesFunctionScoreBuilder' => __DIR__ . '/includes/Search/RescoreBuilders.php',
	'CirrusSearch\\Search\\CirrusIndexField' => __DIR__ . '/includes/Search/CirrusIndexField.php',
	'CirrusSearch\\Search\\CirrusSearchIndexFieldFactory' => __DIR__ . '/includes/Search/CirrusSearchIndexFieldFactory.php',
	'CirrusSearch\\Search\\CompletionResultsCollector' => __DIR__ . '/includes/Search/CompletionResultsCollector.php',
	'CirrusSearch\\Search\\CompositeCrossProjectBlockScorer' => __DIR__ . '/includes/Search/CrossProjectBlockScorer.php',
	'CirrusSearch\\Search\\CrossProjectBlockScorer' => __DIR__ . '/includes/Search/CrossProjectBlockScorer.php',
	'CirrusSearch\\Search\\CrossProjectBlockScorerFactory' => __DIR__ . '/includes/Search/CrossProjectBlockScorer.php',
	'CirrusSearch\\Search\\CustomFieldFunctionScoreBuilder' => __DIR__ . '/includes/Search/RescoreBuilders.php',
	'CirrusSearch\\Search\\DatetimeIndexField' => __DIR__ . '/includes/Search/DatetimeIndexField.php',
	'CirrusSearch\\Search\\EmptyResultSet' => __DIR__ . '/includes/Search/EmptyResultSet.php',
	'CirrusSearch\\Search\\Escaper' => __DIR__ . '/includes/Search/Escaper.php',
	'CirrusSearch\\Search\\FancyTitleResultsType' => __DIR__ . '/includes/Search/ResultsType.php',
	'CirrusSearch\\Search\\Filters' => __DIR__ . '/includes/Search/Filters.php',
	'CirrusSearch\\Search\\FullTextResultsType' => __DIR__ . '/includes/Search/ResultsType.php',
	'CirrusSearch\\Search\\FunctionScoreBuilder' => __DIR__ . '/includes/Search/RescoreBuilders.php',
	'CirrusSearch\\Search\\FunctionScoreChain' => __DIR__ . '/includes/Search/RescoreBuilders.php',
	'CirrusSearch\\Search\\FunctionScoreDecorator' => __DIR__ . '/includes/Search/RescoreBuilders.php',
	'CirrusSearch\\Search\\GeoMeanFunctionScoreBuilder' => __DIR__ . '/includes/Search/RescoreBuilders.php',
	'CirrusSearch\\Search\\IdResultsType' => __DIR__ . '/includes/Search/ResultsType.php',
	'CirrusSearch\\Search\\IncomingLinksFunctionScoreBuilder' => __DIR__ . '/includes/Search/RescoreBuilders.php',
	'CirrusSearch\\Search\\IntegerIndexField' => __DIR__ . '/includes/Search/IntegerIndexField.php',
	'CirrusSearch\\Search\\InterleavedResultSet' => __DIR__ . '/includes/Search/InterleavedResultSet.php',
	'CirrusSearch\\Search\\InvalidRescoreProfileException' => __DIR__ . '/includes/Search/RescoreBuilders.php',
	'CirrusSearch\\Search\\KeywordIndexField' => __DIR__ . '/includes/Search/KeywordIndexField.php',
	'CirrusSearch\\Search\\LangWeightFunctionScoreBuilder' => __DIR__ . '/includes/Search/RescoreBuilders.php',
	'CirrusSearch\\Search\\LogMultFunctionScoreBuilder' => __DIR__ . '/includes/Search/RescoreBuilders.php',
	'CirrusSearch\\Search\\LogScaleBoostFunctionScoreBuilder' => __DIR__ . '/includes/Search/RescoreBuilders.php',
	'CirrusSearch\\Search\\NamespacesFunctionScoreBuilder' => __DIR__ . '/includes/Search/RescoreBuilders.php',
	'CirrusSearch\\Search\\NestedIndexField' => __DIR__ . '/includes/Search/NestedIndexField.php',
	'CirrusSearch\\Search\\NumberIndexField' => __DIR__ . '/includes/Search/NumberIndexField.php',
	'CirrusSearch\\Search\\OpeningTextIndexField' => __DIR__ . '/includes/Search/OpeningTextIndexField.php',
	'CirrusSearch\\Search\\PreferRecentFunctionScoreBuilder' => __DIR__ . '/includes/Search/RescoreBuilders.php',
	'CirrusSearch\\Search\\RandomCrossProjectBlockScorer' => __DIR__ . '/includes/Search/CrossProjectBlockScorer.php',
	'CirrusSearch\\Search\\RecallCrossProjectBlockScorer' => __DIR__ . '/includes/Search/CrossProjectBlockScorer.php',
	'CirrusSearch\\Search\\RescoreBuilder' => __DIR__ . '/includes/Search/RescoreBuilders.php',
	'CirrusSearch\\Search\\Result' => __DIR__ . '/includes/Search/Result.php',
	'CirrusSearch\\Search\\ResultSet' => __DIR__ . '/includes/Search/ResultSet.php',
	'CirrusSearch\\Search\\ResultsType' => __DIR__ . '/includes/Search/ResultsType.php',
	'CirrusSearch\\Search\\SatuFunctionScoreBuilder' => __DIR__ . '/includes/Search/RescoreBuilders.php',
	'CirrusSearch\\Search\\ScriptScoreFunctionScoreBuilder' => __DIR__ . '/includes/Search/RescoreBuilders.php',
	'CirrusSearch\\Search\\SearchContext' => __DIR__ . '/includes/Search/SearchContext.php',
	'CirrusSearch\\Search\\SearchMetricsProvider' => __DIR__ . '/includes/Search/SearchMetricsProvider.php',
	'CirrusSearch\\Search\\SearchRequestBuilder' => __DIR__ . '/includes/Search/SearchRequestBuilder.php',
	'CirrusSearch\\Search\\ShortTextIndexField' => __DIR__ . '/includes/Search/ShortTextIndexField.php',
	'CirrusSearch\\Search\\SingleAggResultsType' => __DIR__ . '/includes/Search/ResultsType.php',
	'CirrusSearch\\Search\\SourceTextIndexField' => __DIR__ . '/includes/Search/SourceTextIndexField.php',
	'CirrusSearch\\Search\\StaticCrossProjectBlockScorer' => __DIR__ . '/includes/Search/CrossProjectBlockScorer.php',
	'CirrusSearch\\Search\\TeamDraftInterleaver' => __DIR__ . '/includes/Search/TeamDraftInterleaver.php',
	'CirrusSearch\\Search\\TermBoostScoreBuilder' => __DIR__ . '/includes/Search/RescoreBuilders.php',
	'CirrusSearch\\Search\\TextIndexField' => __DIR__ . '/includes/Search/TextIndexField.php',
	'CirrusSearch\\Search\\TitleHelper' => __DIR__ . '/includes/Search/TitleHelper.php',
	'CirrusSearch\\Search\\TitleResultsType' => __DIR__ . '/includes/Search/ResultsType.php',
	'CirrusSearch\\Searcher' => __DIR__ . '/includes/Searcher.php',
	'CirrusSearch\\SiteMatrixInterwikiResolver' => __DIR__ . '/includes/SiteMatrixInterwikiResolver.php',
	'CirrusSearch\\Test\\DummyConnection' => __DIR__ . '/tests/unit/TestUtils.php',
	'CirrusSearch\\Updater' => __DIR__ . '/includes/Updater.php',
	'CirrusSearch\\UserTesting' => __DIR__ . '/includes/UserTesting.php',
	'CirrusSearch\\Util' => __DIR__ . '/includes/Util.php',
	'CirrusSearch\\Version' => __DIR__ . '/includes/Version.php',
];
