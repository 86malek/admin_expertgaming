<?php
namespace Aws\FraudDetector;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Fraud Detector** service.
 * @method \Aws\Result batchCreateVariable(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateVariableAsync(array $args = [])
 * @method \Aws\Result batchGetVariable(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetVariableAsync(array $args = [])
 * @method \Aws\Result createDetectorVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDetectorVersionAsync(array $args = [])
 * @method \Aws\Result createModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelAsync(array $args = [])
 * @method \Aws\Result createModelVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelVersionAsync(array $args = [])
 * @method \Aws\Result createRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuleAsync(array $args = [])
 * @method \Aws\Result createVariable(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createVariableAsync(array $args = [])
 * @method \Aws\Result deleteDetector(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDetectorAsync(array $args = [])
 * @method \Aws\Result deleteDetectorVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDetectorVersionAsync(array $args = [])
 * @method \Aws\Result deleteEntityType(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEntityTypeAsync(array $args = [])
 * @method \Aws\Result deleteEvent(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventAsync(array $args = [])
 * @method \Aws\Result deleteEventType(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventTypeAsync(array $args = [])
 * @method \Aws\Result deleteExternalModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteExternalModelAsync(array $args = [])
 * @method \Aws\Result deleteLabel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLabelAsync(array $args = [])
 * @method \Aws\Result deleteModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteModelAsync(array $args = [])
 * @method \Aws\Result deleteModelVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteModelVersionAsync(array $args = [])
 * @method \Aws\Result deleteOutcome(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOutcomeAsync(array $args = [])
 * @method \Aws\Result deleteRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuleAsync(array $args = [])
 * @method \Aws\Result deleteVariable(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVariableAsync(array $args = [])
 * @method \Aws\Result describeDetector(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDetectorAsync(array $args = [])
 * @method \Aws\Result describeModelVersions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeModelVersionsAsync(array $args = [])
 * @method \Aws\Result getDetectorVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDetectorVersionAsync(array $args = [])
 * @method \Aws\Result getDetectors(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDetectorsAsync(array $args = [])
 * @method \Aws\Result getEntityTypes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getEntityTypesAsync(array $args = [])
 * @method \Aws\Result getEventPrediction(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventPredictionAsync(array $args = [])
 * @method \Aws\Result getEventTypes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventTypesAsync(array $args = [])
 * @method \Aws\Result getExternalModels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getExternalModelsAsync(array $args = [])
 * @method \Aws\Result getKMSEncryptionKey(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getKMSEncryptionKeyAsync(array $args = [])
 * @method \Aws\Result getLabels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getLabelsAsync(array $args = [])
 * @method \Aws\Result getModelVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getModelVersionAsync(array $args = [])
 * @method \Aws\Result getModels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getModelsAsync(array $args = [])
 * @method \Aws\Result getOutcomes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getOutcomesAsync(array $args = [])
 * @method \Aws\Result getRules(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getRulesAsync(array $args = [])
 * @method \Aws\Result getVariables(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVariablesAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result putDetector(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putDetectorAsync(array $args = [])
 * @method \Aws\Result putEntityType(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putEntityTypeAsync(array $args = [])
 * @method \Aws\Result putEventType(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putEventTypeAsync(array $args = [])
 * @method \Aws\Result putExternalModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putExternalModelAsync(array $args = [])
 * @method \Aws\Result putKMSEncryptionKey(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putKMSEncryptionKeyAsync(array $args = [])
 * @method \Aws\Result putLabel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putLabelAsync(array $args = [])
 * @method \Aws\Result putOutcome(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putOutcomeAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateDetectorVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDetectorVersionAsync(array $args = [])
 * @method \Aws\Result updateDetectorVersionMetadata(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDetectorVersionMetadataAsync(array $args = [])
 * @method \Aws\Result updateDetectorVersionStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDetectorVersionStatusAsync(array $args = [])
 * @method \Aws\Result updateModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateModelAsync(array $args = [])
 * @method \Aws\Result updateModelVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateModelVersionAsync(array $args = [])
 * @method \Aws\Result updateModelVersionStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateModelVersionStatusAsync(array $args = [])
 * @method \Aws\Result updateRuleMetadata(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuleMetadataAsync(array $args = [])
 * @method \Aws\Result updateRuleVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuleVersionAsync(array $args = [])
 * @method \Aws\Result updateVariable(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVariableAsync(array $args = [])
 */
class FraudDetectorClient extends AwsClient {}
