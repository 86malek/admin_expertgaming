<?php
// This file was auto-generated from sdk-root/src/data/devops-guru/2020-12-01/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2020-12-01', 'endpointPrefix' => 'devops-guru', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceFullName' => 'Amazon DevOps Guru', 'serviceId' => 'DevOps Guru', 'signatureVersion' => 'v4', 'signingName' => 'devops-guru', 'uid' => 'devops-guru-2020-12-01', ], 'operations' => [ 'AddNotificationChannel' => [ 'name' => 'AddNotificationChannel', 'http' => [ 'method' => 'PUT', 'requestUri' => '/channels', 'responseCode' => 200, ], 'input' => [ 'shape' => 'AddNotificationChannelRequest', ], 'output' => [ 'shape' => 'AddNotificationChannelResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'DescribeAccountHealth' => [ 'name' => 'DescribeAccountHealth', 'http' => [ 'method' => 'GET', 'requestUri' => '/accounts/health', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DescribeAccountHealthRequest', ], 'output' => [ 'shape' => 'DescribeAccountHealthResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'DescribeAccountOverview' => [ 'name' => 'DescribeAccountOverview', 'http' => [ 'method' => 'POST', 'requestUri' => '/accounts/overview', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DescribeAccountOverviewRequest', ], 'output' => [ 'shape' => 'DescribeAccountOverviewResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'DescribeAnomaly' => [ 'name' => 'DescribeAnomaly', 'http' => [ 'method' => 'GET', 'requestUri' => '/anomalies/{Id}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DescribeAnomalyRequest', ], 'output' => [ 'shape' => 'DescribeAnomalyResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'DescribeFeedback' => [ 'name' => 'DescribeFeedback', 'http' => [ 'method' => 'POST', 'requestUri' => '/feedback', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DescribeFeedbackRequest', ], 'output' => [ 'shape' => 'DescribeFeedbackResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'DescribeInsight' => [ 'name' => 'DescribeInsight', 'http' => [ 'method' => 'GET', 'requestUri' => '/insights/{Id}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DescribeInsightRequest', ], 'output' => [ 'shape' => 'DescribeInsightResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'DescribeResourceCollectionHealth' => [ 'name' => 'DescribeResourceCollectionHealth', 'http' => [ 'method' => 'GET', 'requestUri' => '/accounts/health/resource-collection/{ResourceCollectionType}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DescribeResourceCollectionHealthRequest', ], 'output' => [ 'shape' => 'DescribeResourceCollectionHealthResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'DescribeServiceIntegration' => [ 'name' => 'DescribeServiceIntegration', 'http' => [ 'method' => 'GET', 'requestUri' => '/service-integrations', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DescribeServiceIntegrationRequest', ], 'output' => [ 'shape' => 'DescribeServiceIntegrationResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'GetResourceCollection' => [ 'name' => 'GetResourceCollection', 'http' => [ 'method' => 'GET', 'requestUri' => '/resource-collections/{ResourceCollectionType}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetResourceCollectionRequest', ], 'output' => [ 'shape' => 'GetResourceCollectionResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListAnomaliesForInsight' => [ 'name' => 'ListAnomaliesForInsight', 'http' => [ 'method' => 'POST', 'requestUri' => '/anomalies/insight/{InsightId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListAnomaliesForInsightRequest', ], 'output' => [ 'shape' => 'ListAnomaliesForInsightResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListEvents' => [ 'name' => 'ListEvents', 'http' => [ 'method' => 'POST', 'requestUri' => '/events', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListEventsRequest', ], 'output' => [ 'shape' => 'ListEventsResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListInsights' => [ 'name' => 'ListInsights', 'http' => [ 'method' => 'POST', 'requestUri' => '/insights', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListInsightsRequest', ], 'output' => [ 'shape' => 'ListInsightsResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListNotificationChannels' => [ 'name' => 'ListNotificationChannels', 'http' => [ 'method' => 'POST', 'requestUri' => '/channels', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListNotificationChannelsRequest', ], 'output' => [ 'shape' => 'ListNotificationChannelsResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListRecommendations' => [ 'name' => 'ListRecommendations', 'http' => [ 'method' => 'POST', 'requestUri' => '/recommendations', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListRecommendationsRequest', ], 'output' => [ 'shape' => 'ListRecommendationsResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'PutFeedback' => [ 'name' => 'PutFeedback', 'http' => [ 'method' => 'PUT', 'requestUri' => '/feedback', 'responseCode' => 200, ], 'input' => [ 'shape' => 'PutFeedbackRequest', ], 'output' => [ 'shape' => 'PutFeedbackResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'RemoveNotificationChannel' => [ 'name' => 'RemoveNotificationChannel', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/channels/{Id}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'RemoveNotificationChannelRequest', ], 'output' => [ 'shape' => 'RemoveNotificationChannelResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'SearchInsights' => [ 'name' => 'SearchInsights', 'http' => [ 'method' => 'POST', 'requestUri' => '/insights/search', 'responseCode' => 200, ], 'input' => [ 'shape' => 'SearchInsightsRequest', ], 'output' => [ 'shape' => 'SearchInsightsResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'UpdateResourceCollection' => [ 'name' => 'UpdateResourceCollection', 'http' => [ 'method' => 'PUT', 'requestUri' => '/resource-collections', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UpdateResourceCollectionRequest', ], 'output' => [ 'shape' => 'UpdateResourceCollectionResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'UpdateServiceIntegration' => [ 'name' => 'UpdateServiceIntegration', 'http' => [ 'method' => 'PUT', 'requestUri' => '/service-integrations', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UpdateServiceIntegrationRequest', ], 'output' => [ 'shape' => 'UpdateServiceIntegrationResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'required' => [ 'Message', ], 'members' => [ 'Message' => [ 'shape' => 'ErrorMessageString', ], ], 'error' => [ 'httpStatusCode' => 403, ], 'exception' => true, ], 'AddNotificationChannelRequest' => [ 'type' => 'structure', 'required' => [ 'Config', ], 'members' => [ 'Config' => [ 'shape' => 'NotificationChannelConfig', ], ], ], 'AddNotificationChannelResponse' => [ 'type' => 'structure', 'required' => [ 'Id', ], 'members' => [ 'Id' => [ 'shape' => 'NotificationChannelId', ], ], ], 'AnomalyId' => [ 'type' => 'string', 'max' => 100, 'min' => 1, 'pattern' => '^[\\w-]*$', ], 'AnomalyLimit' => [ 'type' => 'double', 'box' => true, ], 'AnomalySeverity' => [ 'type' => 'string', 'enum' => [ 'LOW', 'MEDIUM', 'HIGH', ], ], 'AnomalySourceDetails' => [ 'type' => 'structure', 'members' => [ 'CloudWatchMetrics' => [ 'shape' => 'CloudWatchMetricsDetails', ], ], ], 'AnomalyStatus' => [ 'type' => 'string', 'enum' => [ 'ONGOING', 'CLOSED', ], ], 'AnomalyTimeRange' => [ 'type' => 'structure', 'required' => [ 'StartTime', ], 'members' => [ 'StartTime' => [ 'shape' => 'Timestamp', ], 'EndTime' => [ 'shape' => 'Timestamp', ], ], ], 'Channels' => [ 'type' => 'list', 'member' => [ 'shape' => 'NotificationChannel', ], ], 'CloudFormationCollection' => [ 'type' => 'structure', 'members' => [ 'StackNames' => [ 'shape' => 'StackNames', ], ], ], 'CloudFormationCollectionFilter' => [ 'type' => 'structure', 'members' => [ 'StackNames' => [ 'shape' => 'StackNames', ], ], ], 'CloudFormationHealth' => [ 'type' => 'structure', 'members' => [ 'StackName' => [ 'shape' => 'StackName', ], 'Insight' => [ 'shape' => 'InsightHealth', ], ], ], 'CloudFormationHealths' => [ 'type' => 'list', 'member' => [ 'shape' => 'CloudFormationHealth', ], ], 'CloudWatchMetricsDetail' => [ 'type' => 'structure', 'members' => [ 'MetricName' => [ 'shape' => 'CloudWatchMetricsMetricName', ], 'Namespace' => [ 'shape' => 'CloudWatchMetricsNamespace', ], 'Dimensions' => [ 'shape' => 'CloudWatchMetricsDimensions', ], 'Stat' => [ 'shape' => 'CloudWatchMetricsStat', ], 'Unit' => [ 'shape' => 'CloudWatchMetricsUnit', ], 'Period' => [ 'shape' => 'CloudWatchMetricsPeriod', ], ], ], 'CloudWatchMetricsDetails' => [ 'type' => 'list', 'member' => [ 'shape' => 'CloudWatchMetricsDetail', ], ], 'CloudWatchMetricsDimension' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'CloudWatchMetricsDimensionName', ], 'Value' => [ 'shape' => 'CloudWatchMetricsDimensionValue', ], ], ], 'CloudWatchMetricsDimensionName' => [ 'type' => 'string', ], 'CloudWatchMetricsDimensionValue' => [ 'type' => 'string', ], 'CloudWatchMetricsDimensions' => [ 'type' => 'list', 'member' => [ 'shape' => 'CloudWatchMetricsDimension', ], ], 'CloudWatchMetricsMetricName' => [ 'type' => 'string', ], 'CloudWatchMetricsNamespace' => [ 'type' => 'string', ], 'CloudWatchMetricsPeriod' => [ 'type' => 'integer', ], 'CloudWatchMetricsStat' => [ 'type' => 'string', 'enum' => [ 'Sum', 'Average', 'SampleCount', 'Minimum', 'Maximum', 'p99', 'p90', 'p50', ], ], 'CloudWatchMetricsUnit' => [ 'type' => 'string', ], 'ConflictException' => [ 'type' => 'structure', 'required' => [ 'Message', 'ResourceId', 'ResourceType', ], 'members' => [ 'Message' => [ 'shape' => 'ErrorMessageString', ], 'ResourceId' => [ 'shape' => 'ResourceIdString', ], 'ResourceType' => [ 'shape' => 'ResourceIdType', ], ], 'error' => [ 'httpStatusCode' => 409, ], 'exception' => true, ], 'DescribeAccountHealthRequest' => [ 'type' => 'structure', 'members' => [], ], 'DescribeAccountHealthResponse' => [ 'type' => 'structure', 'required' => [ 'OpenReactiveInsights', 'OpenProactiveInsights', 'MetricsAnalyzed', 'ResourceHours', ], 'members' => [ 'OpenReactiveInsights' => [ 'shape' => 'NumOpenReactiveInsights', ], 'OpenProactiveInsights' => [ 'shape' => 'NumOpenProactiveInsights', ], 'MetricsAnalyzed' => [ 'shape' => 'NumMetricsAnalyzed', ], 'ResourceHours' => [ 'shape' => 'ResourceHours', ], ], ], 'DescribeAccountOverviewRequest' => [ 'type' => 'structure', 'required' => [ 'FromTime', ], 'members' => [ 'FromTime' => [ 'shape' => 'Timestamp', ], 'ToTime' => [ 'shape' => 'Timestamp', ], ], ], 'DescribeAccountOverviewResponse' => [ 'type' => 'structure', 'required' => [ 'ReactiveInsights', 'ProactiveInsights', 'MeanTimeToRecoverInMilliseconds', ], 'members' => [ 'ReactiveInsights' => [ 'shape' => 'NumReactiveInsights', ], 'ProactiveInsights' => [ 'shape' => 'NumProactiveInsights', ], 'MeanTimeToRecoverInMilliseconds' => [ 'shape' => 'MeanTimeToRecoverInMilliseconds', ], ], ], 'DescribeAnomalyRequest' => [ 'type' => 'structure', 'required' => [ 'Id', ], 'members' => [ 'Id' => [ 'shape' => 'AnomalyId', 'location' => 'uri', 'locationName' => 'Id', ], ], ], 'DescribeAnomalyResponse' => [ 'type' => 'structure', 'members' => [ 'ProactiveAnomaly' => [ 'shape' => 'ProactiveAnomaly', ], 'ReactiveAnomaly' => [ 'shape' => 'ReactiveAnomaly', ], ], ], 'DescribeFeedbackRequest' => [ 'type' => 'structure', 'members' => [ 'InsightId' => [ 'shape' => 'InsightId', ], ], ], 'DescribeFeedbackResponse' => [ 'type' => 'structure', 'members' => [ 'InsightFeedback' => [ 'shape' => 'InsightFeedback', ], ], ], 'DescribeInsightRequest' => [ 'type' => 'structure', 'required' => [ 'Id', ], 'members' => [ 'Id' => [ 'shape' => 'InsightId', 'location' => 'uri', 'locationName' => 'Id', ], ], ], 'DescribeInsightResponse' => [ 'type' => 'structure', 'members' => [ 'ProactiveInsight' => [ 'shape' => 'ProactiveInsight', ], 'ReactiveInsight' => [ 'shape' => 'ReactiveInsight', ], ], ], 'DescribeResourceCollectionHealthRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceCollectionType', ], 'members' => [ 'ResourceCollectionType' => [ 'shape' => 'ResourceCollectionType', 'location' => 'uri', 'locationName' => 'ResourceCollectionType', ], 'NextToken' => [ 'shape' => 'UuidNextToken', 'location' => 'querystring', 'locationName' => 'NextToken', ], ], ], 'DescribeResourceCollectionHealthResponse' => [ 'type' => 'structure', 'required' => [ 'CloudFormation', ], 'members' => [ 'CloudFormation' => [ 'shape' => 'CloudFormationHealths', ], 'NextToken' => [ 'shape' => 'UuidNextToken', ], ], ], 'DescribeServiceIntegrationRequest' => [ 'type' => 'structure', 'members' => [], ], 'DescribeServiceIntegrationResponse' => [ 'type' => 'structure', 'members' => [ 'ServiceIntegration' => [ 'shape' => 'ServiceIntegrationConfig', ], ], ], 'EndTimeRange' => [ 'type' => 'structure', 'members' => [ 'FromTime' => [ 'shape' => 'Timestamp', ], 'ToTime' => [ 'shape' => 'Timestamp', ], ], ], 'ErrorMessageString' => [ 'type' => 'string', ], 'ErrorNameString' => [ 'type' => 'string', ], 'ErrorQuotaCodeString' => [ 'type' => 'string', ], 'ErrorServiceCodeString' => [ 'type' => 'string', ], 'Event' => [ 'type' => 'structure', 'members' => [ 'ResourceCollection' => [ 'shape' => 'ResourceCollection', ], 'Id' => [ 'shape' => 'EventId', ], 'Time' => [ 'shape' => 'Timestamp', ], 'EventSource' => [ 'shape' => 'EventSource', ], 'Name' => [ 'shape' => 'EventName', ], 'DataSource' => [ 'shape' => 'EventDataSource', ], 'EventClass' => [ 'shape' => 'EventClass', ], 'Resources' => [ 'shape' => 'EventResources', ], ], ], 'EventClass' => [ 'type' => 'string', 'enum' => [ 'INFRASTRUCTURE', 'DEPLOYMENT', 'SECURITY_CHANGE', 'CONFIG_CHANGE', 'SCHEMA_CHANGE', ], ], 'EventDataSource' => [ 'type' => 'string', 'enum' => [ 'AWS_CLOUD_TRAIL', 'AWS_CODE_DEPLOY', ], ], 'EventId' => [ 'type' => 'string', ], 'EventName' => [ 'type' => 'string', 'max' => 50, 'min' => 0, ], 'EventResource' => [ 'type' => 'structure', 'members' => [ 'Type' => [ 'shape' => 'EventResourceType', ], 'Name' => [ 'shape' => 'EventResourceName', ], 'Arn' => [ 'shape' => 'EventResourceArn', ], ], ], 'EventResourceArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 36, 'pattern' => '^arn:aws[-a-z]*:[a-z0-9-]*:[a-z0-9-]*:\\d{12}:.*$', ], 'EventResourceName' => [ 'type' => 'string', 'max' => 2048, 'min' => 0, 'pattern' => '^.*$', ], 'EventResourceType' => [ 'type' => 'string', 'max' => 2048, 'min' => 0, 'pattern' => '^.*$', ], 'EventResources' => [ 'type' => 'list', 'member' => [ 'shape' => 'EventResource', ], ], 'EventSource' => [ 'type' => 'string', 'max' => 50, 'min' => 10, 'pattern' => '^[a-z]+[a-z0-9]*\\.amazonaws\\.com|aws\\.events$', ], 'EventTimeRange' => [ 'type' => 'structure', 'required' => [ 'FromTime', 'ToTime', ], 'members' => [ 'FromTime' => [ 'shape' => 'Timestamp', ], 'ToTime' => [ 'shape' => 'Timestamp', ], ], ], 'Events' => [ 'type' => 'list', 'member' => [ 'shape' => 'Event', ], ], 'GetResourceCollectionRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceCollectionType', ], 'members' => [ 'ResourceCollectionType' => [ 'shape' => 'ResourceCollectionType', 'location' => 'uri', 'locationName' => 'ResourceCollectionType', ], 'NextToken' => [ 'shape' => 'UuidNextToken', 'location' => 'querystring', 'locationName' => 'NextToken', ], ], ], 'GetResourceCollectionResponse' => [ 'type' => 'structure', 'members' => [ 'ResourceCollection' => [ 'shape' => 'ResourceCollectionFilter', ], 'NextToken' => [ 'shape' => 'UuidNextToken', ], ], ], 'InsightFeedback' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'InsightId', ], 'Feedback' => [ 'shape' => 'InsightFeedbackOption', ], ], ], 'InsightFeedbackOption' => [ 'type' => 'string', 'enum' => [ 'VALID_COLLECTION', 'RECOMMENDATION_USEFUL', 'ALERT_TOO_SENSITIVE', 'DATA_NOISY_ANOMALY', 'DATA_INCORRECT', ], ], 'InsightHealth' => [ 'type' => 'structure', 'members' => [ 'OpenProactiveInsights' => [ 'shape' => 'NumOpenProactiveInsights', ], 'OpenReactiveInsights' => [ 'shape' => 'NumOpenReactiveInsights', ], 'MeanTimeToRecoverInMilliseconds' => [ 'shape' => 'MeanTimeToRecoverInMilliseconds', ], ], ], 'InsightId' => [ 'type' => 'string', 'max' => 100, 'min' => 1, 'pattern' => '^[\\w-]*$', ], 'InsightName' => [ 'type' => 'string', 'max' => 530, 'min' => 1, 'pattern' => '^[\\s\\S]*$', ], 'InsightSeverities' => [ 'type' => 'list', 'member' => [ 'shape' => 'InsightSeverity', ], 'max' => 3, 'min' => 0, ], 'InsightSeverity' => [ 'type' => 'string', 'enum' => [ 'LOW', 'MEDIUM', 'HIGH', ], ], 'InsightStatus' => [ 'type' => 'string', 'enum' => [ 'ONGOING', 'CLOSED', ], ], 'InsightStatuses' => [ 'type' => 'list', 'member' => [ 'shape' => 'InsightStatus', ], 'max' => 2, 'min' => 0, ], 'InsightTimeRange' => [ 'type' => 'structure', 'required' => [ 'StartTime', ], 'members' => [ 'StartTime' => [ 'shape' => 'Timestamp', ], 'EndTime' => [ 'shape' => 'Timestamp', ], ], ], 'InsightType' => [ 'type' => 'string', 'enum' => [ 'REACTIVE', 'PROACTIVE', ], ], 'InternalServerException' => [ 'type' => 'structure', 'required' => [ 'Message', ], 'members' => [ 'Message' => [ 'shape' => 'ErrorMessageString', ], 'RetryAfterSeconds' => [ 'shape' => 'RetryAfterSeconds', 'location' => 'header', 'locationName' => 'Retry-After', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, ], 'ListAnomaliesForInsightMaxResults' => [ 'type' => 'integer', 'max' => 500, 'min' => 1, ], 'ListAnomaliesForInsightRequest' => [ 'type' => 'structure', 'required' => [ 'InsightId', ], 'members' => [ 'InsightId' => [ 'shape' => 'InsightId', 'location' => 'uri', 'locationName' => 'InsightId', ], 'StartTimeRange' => [ 'shape' => 'StartTimeRange', ], 'MaxResults' => [ 'shape' => 'ListAnomaliesForInsightMaxResults', ], 'NextToken' => [ 'shape' => 'UuidNextToken', ], ], ], 'ListAnomaliesForInsightResponse' => [ 'type' => 'structure', 'members' => [ 'ProactiveAnomalies' => [ 'shape' => 'ProactiveAnomalies', ], 'ReactiveAnomalies' => [ 'shape' => 'ReactiveAnomalies', ], 'NextToken' => [ 'shape' => 'UuidNextToken', ], ], ], 'ListEventsFilters' => [ 'type' => 'structure', 'members' => [ 'InsightId' => [ 'shape' => 'InsightId', ], 'EventTimeRange' => [ 'shape' => 'EventTimeRange', ], 'EventClass' => [ 'shape' => 'EventClass', ], 'EventSource' => [ 'shape' => 'EventSource', ], 'DataSource' => [ 'shape' => 'EventDataSource', ], 'ResourceCollection' => [ 'shape' => 'ResourceCollection', ], ], ], 'ListEventsMaxResults' => [ 'type' => 'integer', 'max' => 200, 'min' => 1, ], 'ListEventsRequest' => [ 'type' => 'structure', 'required' => [ 'Filters', ], 'members' => [ 'Filters' => [ 'shape' => 'ListEventsFilters', ], 'MaxResults' => [ 'shape' => 'ListEventsMaxResults', ], 'NextToken' => [ 'shape' => 'UuidNextToken', ], ], ], 'ListEventsResponse' => [ 'type' => 'structure', 'required' => [ 'Events', ], 'members' => [ 'Events' => [ 'shape' => 'Events', ], 'NextToken' => [ 'shape' => 'UuidNextToken', ], ], ], 'ListInsightsAnyStatusFilter' => [ 'type' => 'structure', 'required' => [ 'Type', 'StartTimeRange', ], 'members' => [ 'Type' => [ 'shape' => 'InsightType', ], 'StartTimeRange' => [ 'shape' => 'StartTimeRange', ], ], ], 'ListInsightsClosedStatusFilter' => [ 'type' => 'structure', 'required' => [ 'Type', 'EndTimeRange', ], 'members' => [ 'Type' => [ 'shape' => 'InsightType', ], 'EndTimeRange' => [ 'shape' => 'EndTimeRange', ], ], ], 'ListInsightsMaxResults' => [ 'type' => 'integer', 'max' => 100, 'min' => 1, ], 'ListInsightsOngoingStatusFilter' => [ 'type' => 'structure', 'required' => [ 'Type', ], 'members' => [ 'Type' => [ 'shape' => 'InsightType', ], ], ], 'ListInsightsRequest' => [ 'type' => 'structure', 'required' => [ 'StatusFilter', ], 'members' => [ 'StatusFilter' => [ 'shape' => 'ListInsightsStatusFilter', ], 'MaxResults' => [ 'shape' => 'ListInsightsMaxResults', ], 'NextToken' => [ 'shape' => 'UuidNextToken', ], ], ], 'ListInsightsResponse' => [ 'type' => 'structure', 'members' => [ 'ProactiveInsights' => [ 'shape' => 'ProactiveInsights', ], 'ReactiveInsights' => [ 'shape' => 'ReactiveInsights', ], 'NextToken' => [ 'shape' => 'UuidNextToken', ], ], ], 'ListInsightsStatusFilter' => [ 'type' => 'structure', 'members' => [ 'Ongoing' => [ 'shape' => 'ListInsightsOngoingStatusFilter', ], 'Closed' => [ 'shape' => 'ListInsightsClosedStatusFilter', ], 'Any' => [ 'shape' => 'ListInsightsAnyStatusFilter', ], ], ], 'ListNotificationChannelsRequest' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'UuidNextToken', ], ], ], 'ListNotificationChannelsResponse' => [ 'type' => 'structure', 'members' => [ 'Channels' => [ 'shape' => 'Channels', ], 'NextToken' => [ 'shape' => 'UuidNextToken', ], ], ], 'ListRecommendationsRequest' => [ 'type' => 'structure', 'required' => [ 'InsightId', ], 'members' => [ 'InsightId' => [ 'shape' => 'InsightId', ], 'NextToken' => [ 'shape' => 'UuidNextToken', ], ], ], 'ListRecommendationsResponse' => [ 'type' => 'structure', 'members' => [ 'Recommendations' => [ 'shape' => 'Recommendations', ], 'NextToken' => [ 'shape' => 'UuidNextToken', ], ], ], 'MeanTimeToRecoverInMilliseconds' => [ 'type' => 'long', ], 'NotificationChannel' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'NotificationChannelId', ], 'Config' => [ 'shape' => 'NotificationChannelConfig', ], ], ], 'NotificationChannelConfig' => [ 'type' => 'structure', 'required' => [ 'Sns', ], 'members' => [ 'Sns' => [ 'shape' => 'SnsChannelConfig', ], ], ], 'NotificationChannelId' => [ 'type' => 'string', 'max' => 36, 'min' => 36, 'pattern' => '^[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}$', ], 'NumMetricsAnalyzed' => [ 'type' => 'integer', ], 'NumOpenProactiveInsights' => [ 'type' => 'integer', ], 'NumOpenReactiveInsights' => [ 'type' => 'integer', ], 'NumProactiveInsights' => [ 'type' => 'integer', ], 'NumReactiveInsights' => [ 'type' => 'integer', ], 'OpsCenterIntegration' => [ 'type' => 'structure', 'members' => [ 'OptInStatus' => [ 'shape' => 'OptInStatus', ], ], ], 'OpsCenterIntegrationConfig' => [ 'type' => 'structure', 'members' => [ 'OptInStatus' => [ 'shape' => 'OptInStatus', ], ], ], 'OptInStatus' => [ 'type' => 'string', 'enum' => [ 'ENABLED', 'DISABLED', ], ], 'PredictionTimeRange' => [ 'type' => 'structure', 'required' => [ 'StartTime', ], 'members' => [ 'StartTime' => [ 'shape' => 'Timestamp', ], 'EndTime' => [ 'shape' => 'Timestamp', ], ], ], 'ProactiveAnomalies' => [ 'type' => 'list', 'member' => [ 'shape' => 'ProactiveAnomalySummary', ], ], 'ProactiveAnomaly' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'AnomalyId', ], 'Severity' => [ 'shape' => 'AnomalySeverity', ], 'Status' => [ 'shape' => 'AnomalyStatus', ], 'UpdateTime' => [ 'shape' => 'Timestamp', ], 'AnomalyTimeRange' => [ 'shape' => 'AnomalyTimeRange', ], 'PredictionTimeRange' => [ 'shape' => 'PredictionTimeRange', ], 'SourceDetails' => [ 'shape' => 'AnomalySourceDetails', ], 'AssociatedInsightId' => [ 'shape' => 'InsightId', ], 'ResourceCollection' => [ 'shape' => 'ResourceCollection', ], 'Limit' => [ 'shape' => 'AnomalyLimit', ], ], ], 'ProactiveAnomalySummary' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'AnomalyId', ], 'Severity' => [ 'shape' => 'AnomalySeverity', ], 'Status' => [ 'shape' => 'AnomalyStatus', ], 'UpdateTime' => [ 'shape' => 'Timestamp', ], 'AnomalyTimeRange' => [ 'shape' => 'AnomalyTimeRange', ], 'PredictionTimeRange' => [ 'shape' => 'PredictionTimeRange', ], 'SourceDetails' => [ 'shape' => 'AnomalySourceDetails', ], 'AssociatedInsightId' => [ 'shape' => 'InsightId', ], 'ResourceCollection' => [ 'shape' => 'ResourceCollection', ], 'Limit' => [ 'shape' => 'AnomalyLimit', ], ], ], 'ProactiveInsight' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'InsightId', ], 'Name' => [ 'shape' => 'InsightName', ], 'Severity' => [ 'shape' => 'InsightSeverity', ], 'Status' => [ 'shape' => 'InsightStatus', ], 'InsightTimeRange' => [ 'shape' => 'InsightTimeRange', ], 'PredictionTimeRange' => [ 'shape' => 'PredictionTimeRange', ], 'ResourceCollection' => [ 'shape' => 'ResourceCollection', ], 'SsmOpsItemId' => [ 'shape' => 'SsmOpsItemId', ], ], ], 'ProactiveInsightSummary' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'InsightId', ], 'Name' => [ 'shape' => 'InsightName', ], 'Severity' => [ 'shape' => 'InsightSeverity', ], 'Status' => [ 'shape' => 'InsightStatus', ], 'InsightTimeRange' => [ 'shape' => 'InsightTimeRange', ], 'PredictionTimeRange' => [ 'shape' => 'PredictionTimeRange', ], 'ResourceCollection' => [ 'shape' => 'ResourceCollection', ], ], ], 'ProactiveInsights' => [ 'type' => 'list', 'member' => [ 'shape' => 'ProactiveInsightSummary', ], ], 'PutFeedbackRequest' => [ 'type' => 'structure', 'members' => [ 'InsightFeedback' => [ 'shape' => 'InsightFeedback', ], ], ], 'PutFeedbackResponse' => [ 'type' => 'structure', 'members' => [], ], 'ReactiveAnomalies' => [ 'type' => 'list', 'member' => [ 'shape' => 'ReactiveAnomalySummary', ], ], 'ReactiveAnomaly' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'AnomalyId', ], 'Severity' => [ 'shape' => 'AnomalySeverity', ], 'Status' => [ 'shape' => 'AnomalyStatus', ], 'AnomalyTimeRange' => [ 'shape' => 'AnomalyTimeRange', ], 'SourceDetails' => [ 'shape' => 'AnomalySourceDetails', ], 'AssociatedInsightId' => [ 'shape' => 'InsightId', ], 'ResourceCollection' => [ 'shape' => 'ResourceCollection', ], ], ], 'ReactiveAnomalySummary' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'AnomalyId', ], 'Severity' => [ 'shape' => 'AnomalySeverity', ], 'Status' => [ 'shape' => 'AnomalyStatus', ], 'AnomalyTimeRange' => [ 'shape' => 'AnomalyTimeRange', ], 'SourceDetails' => [ 'shape' => 'AnomalySourceDetails', ], 'AssociatedInsightId' => [ 'shape' => 'InsightId', ], 'ResourceCollection' => [ 'shape' => 'ResourceCollection', ], ], ], 'ReactiveInsight' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'InsightId', ], 'Name' => [ 'shape' => 'InsightName', ], 'Severity' => [ 'shape' => 'InsightSeverity', ], 'Status' => [ 'shape' => 'InsightStatus', ], 'InsightTimeRange' => [ 'shape' => 'InsightTimeRange', ], 'ResourceCollection' => [ 'shape' => 'ResourceCollection', ], 'SsmOpsItemId' => [ 'shape' => 'SsmOpsItemId', ], ], ], 'ReactiveInsightSummary' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'InsightId', ], 'Name' => [ 'shape' => 'InsightName', ], 'Severity' => [ 'shape' => 'InsightSeverity', ], 'Status' => [ 'shape' => 'InsightStatus', ], 'InsightTimeRange' => [ 'shape' => 'InsightTimeRange', ], 'ResourceCollection' => [ 'shape' => 'ResourceCollection', ], ], ], 'ReactiveInsights' => [ 'type' => 'list', 'member' => [ 'shape' => 'ReactiveInsightSummary', ], ], 'Recommendation' => [ 'type' => 'structure', 'members' => [ 'Description' => [ 'shape' => 'RecommendationDescription', ], 'Link' => [ 'shape' => 'RecommendationLink', ], 'Name' => [ 'shape' => 'RecommendationName', ], 'Reason' => [ 'shape' => 'RecommendationReason', ], 'RelatedEvents' => [ 'shape' => 'RecommendationRelatedEvents', ], 'RelatedAnomalies' => [ 'shape' => 'RecommendationRelatedAnomalies', ], ], ], 'RecommendationDescription' => [ 'type' => 'string', ], 'RecommendationLink' => [ 'type' => 'string', ], 'RecommendationName' => [ 'type' => 'string', ], 'RecommendationReason' => [ 'type' => 'string', ], 'RecommendationRelatedAnomalies' => [ 'type' => 'list', 'member' => [ 'shape' => 'RecommendationRelatedAnomaly', ], ], 'RecommendationRelatedAnomaly' => [ 'type' => 'structure', 'members' => [ 'Resources' => [ 'shape' => 'RecommendationRelatedAnomalyResources', ], 'SourceDetails' => [ 'shape' => 'RelatedAnomalySourceDetails', ], ], ], 'RecommendationRelatedAnomalyResource' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'RecommendationRelatedAnomalyResourceName', ], 'Type' => [ 'shape' => 'RecommendationRelatedAnomalyResourceType', ], ], ], 'RecommendationRelatedAnomalyResourceName' => [ 'type' => 'string', ], 'RecommendationRelatedAnomalyResourceType' => [ 'type' => 'string', ], 'RecommendationRelatedAnomalyResources' => [ 'type' => 'list', 'member' => [ 'shape' => 'RecommendationRelatedAnomalyResource', ], ], 'RecommendationRelatedAnomalySourceDetail' => [ 'type' => 'structure', 'members' => [ 'CloudWatchMetrics' => [ 'shape' => 'RecommendationRelatedCloudWatchMetricsSourceDetails', ], ], ], 'RecommendationRelatedCloudWatchMetricsSourceDetail' => [ 'type' => 'structure', 'members' => [ 'MetricName' => [ 'shape' => 'RecommendationRelatedCloudWatchMetricsSourceMetricName', ], 'Namespace' => [ 'shape' => 'RecommendationRelatedCloudWatchMetricsSourceNamespace', ], ], ], 'RecommendationRelatedCloudWatchMetricsSourceDetails' => [ 'type' => 'list', 'member' => [ 'shape' => 'RecommendationRelatedCloudWatchMetricsSourceDetail', ], ], 'RecommendationRelatedCloudWatchMetricsSourceMetricName' => [ 'type' => 'string', ], 'RecommendationRelatedCloudWatchMetricsSourceNamespace' => [ 'type' => 'string', ], 'RecommendationRelatedEvent' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'RecommendationRelatedEventName', ], 'Resources' => [ 'shape' => 'RecommendationRelatedEventResources', ], ], ], 'RecommendationRelatedEventName' => [ 'type' => 'string', ], 'RecommendationRelatedEventResource' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'RecommendationRelatedEventResourceName', ], 'Type' => [ 'shape' => 'RecommendationRelatedEventResourceType', ], ], ], 'RecommendationRelatedEventResourceName' => [ 'type' => 'string', ], 'RecommendationRelatedEventResourceType' => [ 'type' => 'string', ], 'RecommendationRelatedEventResources' => [ 'type' => 'list', 'member' => [ 'shape' => 'RecommendationRelatedEventResource', ], ], 'RecommendationRelatedEvents' => [ 'type' => 'list', 'member' => [ 'shape' => 'RecommendationRelatedEvent', ], ], 'Recommendations' => [ 'type' => 'list', 'member' => [ 'shape' => 'Recommendation', ], 'max' => 10, 'min' => 0, ], 'RelatedAnomalySourceDetails' => [ 'type' => 'list', 'member' => [ 'shape' => 'RecommendationRelatedAnomalySourceDetail', ], ], 'RemoveNotificationChannelRequest' => [ 'type' => 'structure', 'required' => [ 'Id', ], 'members' => [ 'Id' => [ 'shape' => 'NotificationChannelId', 'location' => 'uri', 'locationName' => 'Id', ], ], ], 'RemoveNotificationChannelResponse' => [ 'type' => 'structure', 'members' => [], ], 'ResourceCollection' => [ 'type' => 'structure', 'members' => [ 'CloudFormation' => [ 'shape' => 'CloudFormationCollection', ], ], ], 'ResourceCollectionFilter' => [ 'type' => 'structure', 'members' => [ 'CloudFormation' => [ 'shape' => 'CloudFormationCollectionFilter', ], ], ], 'ResourceCollectionType' => [ 'type' => 'string', 'enum' => [ 'AWS_CLOUD_FORMATION', ], ], 'ResourceHours' => [ 'type' => 'long', ], 'ResourceIdString' => [ 'type' => 'string', ], 'ResourceIdType' => [ 'type' => 'string', ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'required' => [ 'Message', 'ResourceId', 'ResourceType', ], 'members' => [ 'Message' => [ 'shape' => 'ErrorMessageString', ], 'ResourceId' => [ 'shape' => 'ResourceIdString', ], 'ResourceType' => [ 'shape' => 'ResourceIdType', ], ], 'error' => [ 'httpStatusCode' => 404, ], 'exception' => true, ], 'RetryAfterSeconds' => [ 'type' => 'integer', ], 'SearchInsightsFilters' => [ 'type' => 'structure', 'members' => [ 'Severities' => [ 'shape' => 'InsightSeverities', ], 'Statuses' => [ 'shape' => 'InsightStatuses', ], 'ResourceCollection' => [ 'shape' => 'ResourceCollection', ], ], ], 'SearchInsightsMaxResults' => [ 'type' => 'integer', 'max' => 100, 'min' => 1, ], 'SearchInsightsRequest' => [ 'type' => 'structure', 'required' => [ 'StartTimeRange', 'Type', ], 'members' => [ 'StartTimeRange' => [ 'shape' => 'StartTimeRange', ], 'Filters' => [ 'shape' => 'SearchInsightsFilters', ], 'MaxResults' => [ 'shape' => 'SearchInsightsMaxResults', ], 'NextToken' => [ 'shape' => 'UuidNextToken', ], 'Type' => [ 'shape' => 'InsightType', ], ], ], 'SearchInsightsResponse' => [ 'type' => 'structure', 'members' => [ 'ProactiveInsights' => [ 'shape' => 'ProactiveInsights', ], 'ReactiveInsights' => [ 'shape' => 'ReactiveInsights', ], 'NextToken' => [ 'shape' => 'UuidNextToken', ], ], ], 'ServiceIntegrationConfig' => [ 'type' => 'structure', 'members' => [ 'OpsCenter' => [ 'shape' => 'OpsCenterIntegration', ], ], ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessageString', ], ], 'error' => [ 'httpStatusCode' => 402, ], 'exception' => true, ], 'SnsChannelConfig' => [ 'type' => 'structure', 'members' => [ 'TopicArn' => [ 'shape' => 'TopicArn', ], ], ], 'SsmOpsItemId' => [ 'type' => 'string', 'max' => 100, 'min' => 1, 'pattern' => '^.*$', ], 'StackName' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^[a-zA-Z*]+[a-zA-Z0-9-]*$', ], 'StackNames' => [ 'type' => 'list', 'member' => [ 'shape' => 'StackName', ], ], 'StartTimeRange' => [ 'type' => 'structure', 'members' => [ 'FromTime' => [ 'shape' => 'Timestamp', ], 'ToTime' => [ 'shape' => 'Timestamp', ], ], ], 'ThrottlingException' => [ 'type' => 'structure', 'required' => [ 'Message', ], 'members' => [ 'Message' => [ 'shape' => 'ErrorMessageString', ], 'QuotaCode' => [ 'shape' => 'ErrorQuotaCodeString', ], 'ServiceCode' => [ 'shape' => 'ErrorServiceCodeString', ], 'RetryAfterSeconds' => [ 'shape' => 'RetryAfterSeconds', 'location' => 'header', 'locationName' => 'Retry-After', ], ], 'error' => [ 'httpStatusCode' => 429, ], 'exception' => true, ], 'Timestamp' => [ 'type' => 'timestamp', ], 'TopicArn' => [ 'type' => 'string', 'max' => 1024, 'min' => 36, 'pattern' => '^arn:aws[a-z0-9-]*:sns:[a-z0-9-]+:\\d{12}:[^:]+$', ], 'UpdateCloudFormationCollectionFilter' => [ 'type' => 'structure', 'members' => [ 'StackNames' => [ 'shape' => 'UpdateStackNames', ], ], ], 'UpdateResourceCollectionAction' => [ 'type' => 'string', 'enum' => [ 'ADD', 'REMOVE', ], ], 'UpdateResourceCollectionFilter' => [ 'type' => 'structure', 'members' => [ 'CloudFormation' => [ 'shape' => 'UpdateCloudFormationCollectionFilter', ], ], ], 'UpdateResourceCollectionRequest' => [ 'type' => 'structure', 'required' => [ 'Action', 'ResourceCollection', ], 'members' => [ 'Action' => [ 'shape' => 'UpdateResourceCollectionAction', ], 'ResourceCollection' => [ 'shape' => 'UpdateResourceCollectionFilter', ], ], ], 'UpdateResourceCollectionResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateServiceIntegrationConfig' => [ 'type' => 'structure', 'members' => [ 'OpsCenter' => [ 'shape' => 'OpsCenterIntegrationConfig', ], ], ], 'UpdateServiceIntegrationRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceIntegration', ], 'members' => [ 'ServiceIntegration' => [ 'shape' => 'UpdateServiceIntegrationConfig', ], ], ], 'UpdateServiceIntegrationResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateStackNames' => [ 'type' => 'list', 'member' => [ 'shape' => 'StackName', ], 'max' => 100, 'min' => 0, ], 'UuidNextToken' => [ 'type' => 'string', 'max' => 36, 'min' => 36, 'pattern' => '^[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}$', ], 'ValidationException' => [ 'type' => 'structure', 'required' => [ 'Message', ], 'members' => [ 'Message' => [ 'shape' => 'ErrorMessageString', ], 'Reason' => [ 'shape' => 'ValidationExceptionReason', ], 'Fields' => [ 'shape' => 'ValidationExceptionFields', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'ValidationExceptionField' => [ 'type' => 'structure', 'required' => [ 'Name', 'Message', ], 'members' => [ 'Name' => [ 'shape' => 'ErrorNameString', ], 'Message' => [ 'shape' => 'ErrorMessageString', ], ], ], 'ValidationExceptionFields' => [ 'type' => 'list', 'member' => [ 'shape' => 'ValidationExceptionField', ], ], 'ValidationExceptionReason' => [ 'type' => 'string', 'enum' => [ 'UNKNOWN_OPERATION', 'CANNOT_PARSE', 'FIELD_VALIDATION_FAILED', 'OTHER', ], ], ],];
