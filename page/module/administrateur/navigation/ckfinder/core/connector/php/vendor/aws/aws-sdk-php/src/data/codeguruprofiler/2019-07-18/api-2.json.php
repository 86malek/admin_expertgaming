<?php
// This file was auto-generated from sdk-root/src/data/codeguruprofiler/2019-07-18/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2019-07-18', 'endpointPrefix' => 'codeguru-profiler', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceFullName' => 'Amazon CodeGuru Profiler', 'serviceId' => 'CodeGuruProfiler', 'signatureVersion' => 'v4', 'signingName' => 'codeguru-profiler', 'uid' => 'codeguruprofiler-2019-07-18', ], 'operations' => [ 'AddNotificationChannels' => [ 'name' => 'AddNotificationChannels', 'http' => [ 'method' => 'POST', 'requestUri' => '/profilingGroups/{profilingGroupName}/notificationConfiguration', 'responseCode' => 200, ], 'input' => [ 'shape' => 'AddNotificationChannelsRequest', ], 'output' => [ 'shape' => 'AddNotificationChannelsResponse', ], 'errors' => [ [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'BatchGetFrameMetricData' => [ 'name' => 'BatchGetFrameMetricData', 'http' => [ 'method' => 'POST', 'requestUri' => '/profilingGroups/{profilingGroupName}/frames/-/metrics', 'responseCode' => 200, ], 'input' => [ 'shape' => 'BatchGetFrameMetricDataRequest', ], 'output' => [ 'shape' => 'BatchGetFrameMetricDataResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'ConfigureAgent' => [ 'name' => 'ConfigureAgent', 'http' => [ 'method' => 'POST', 'requestUri' => '/profilingGroups/{profilingGroupName}/configureAgent', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ConfigureAgentRequest', ], 'output' => [ 'shape' => 'ConfigureAgentResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'CreateProfilingGroup' => [ 'name' => 'CreateProfilingGroup', 'http' => [ 'method' => 'POST', 'requestUri' => '/profilingGroups', 'responseCode' => 201, ], 'input' => [ 'shape' => 'CreateProfilingGroupRequest', ], 'output' => [ 'shape' => 'CreateProfilingGroupResponse', ], 'errors' => [ [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], ], 'idempotent' => true, ], 'DeleteProfilingGroup' => [ 'name' => 'DeleteProfilingGroup', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/profilingGroups/{profilingGroupName}', 'responseCode' => 204, ], 'input' => [ 'shape' => 'DeleteProfilingGroupRequest', ], 'output' => [ 'shape' => 'DeleteProfilingGroupResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'idempotent' => true, ], 'DescribeProfilingGroup' => [ 'name' => 'DescribeProfilingGroup', 'http' => [ 'method' => 'GET', 'requestUri' => '/profilingGroups/{profilingGroupName}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DescribeProfilingGroupRequest', ], 'output' => [ 'shape' => 'DescribeProfilingGroupResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'GetFindingsReportAccountSummary' => [ 'name' => 'GetFindingsReportAccountSummary', 'http' => [ 'method' => 'GET', 'requestUri' => '/internal/findingsReports', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetFindingsReportAccountSummaryRequest', ], 'output' => [ 'shape' => 'GetFindingsReportAccountSummaryResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'GetNotificationConfiguration' => [ 'name' => 'GetNotificationConfiguration', 'http' => [ 'method' => 'GET', 'requestUri' => '/profilingGroups/{profilingGroupName}/notificationConfiguration', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetNotificationConfigurationRequest', ], 'output' => [ 'shape' => 'GetNotificationConfigurationResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'GetPolicy' => [ 'name' => 'GetPolicy', 'http' => [ 'method' => 'GET', 'requestUri' => '/profilingGroups/{profilingGroupName}/policy', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetPolicyRequest', ], 'output' => [ 'shape' => 'GetPolicyResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'GetProfile' => [ 'name' => 'GetProfile', 'http' => [ 'method' => 'GET', 'requestUri' => '/profilingGroups/{profilingGroupName}/profile', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetProfileRequest', ], 'output' => [ 'shape' => 'GetProfileResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'GetRecommendations' => [ 'name' => 'GetRecommendations', 'http' => [ 'method' => 'GET', 'requestUri' => '/internal/profilingGroups/{profilingGroupName}/recommendations', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetRecommendationsRequest', ], 'output' => [ 'shape' => 'GetRecommendationsResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'ListFindingsReports' => [ 'name' => 'ListFindingsReports', 'http' => [ 'method' => 'GET', 'requestUri' => '/internal/profilingGroups/{profilingGroupName}/findingsReports', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListFindingsReportsRequest', ], 'output' => [ 'shape' => 'ListFindingsReportsResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'ListProfileTimes' => [ 'name' => 'ListProfileTimes', 'http' => [ 'method' => 'GET', 'requestUri' => '/profilingGroups/{profilingGroupName}/profileTimes', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListProfileTimesRequest', ], 'output' => [ 'shape' => 'ListProfileTimesResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'ListProfilingGroups' => [ 'name' => 'ListProfilingGroups', 'http' => [ 'method' => 'GET', 'requestUri' => '/profilingGroups', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListProfilingGroupsRequest', ], 'output' => [ 'shape' => 'ListProfilingGroupsResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'GET', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'PostAgentProfile' => [ 'name' => 'PostAgentProfile', 'http' => [ 'method' => 'POST', 'requestUri' => '/profilingGroups/{profilingGroupName}/agentProfile', 'responseCode' => 204, ], 'input' => [ 'shape' => 'PostAgentProfileRequest', ], 'output' => [ 'shape' => 'PostAgentProfileResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'PutPermission' => [ 'name' => 'PutPermission', 'http' => [ 'method' => 'PUT', 'requestUri' => '/profilingGroups/{profilingGroupName}/policy/{actionGroup}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'PutPermissionRequest', ], 'output' => [ 'shape' => 'PutPermissionResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'idempotent' => true, ], 'RemoveNotificationChannel' => [ 'name' => 'RemoveNotificationChannel', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/profilingGroups/{profilingGroupName}/notificationConfiguration/{channelId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'RemoveNotificationChannelRequest', ], 'output' => [ 'shape' => 'RemoveNotificationChannelResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'idempotent' => true, ], 'RemovePermission' => [ 'name' => 'RemovePermission', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/profilingGroups/{profilingGroupName}/policy/{actionGroup}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'RemovePermissionRequest', ], 'output' => [ 'shape' => 'RemovePermissionResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'SubmitFeedback' => [ 'name' => 'SubmitFeedback', 'http' => [ 'method' => 'POST', 'requestUri' => '/internal/profilingGroups/{profilingGroupName}/anomalies/{anomalyInstanceId}/feedback', 'responseCode' => 204, ], 'input' => [ 'shape' => 'SubmitFeedbackRequest', ], 'output' => [ 'shape' => 'SubmitFeedbackResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 204, ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'output' => [ 'shape' => 'TagResourceResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 204, ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'output' => [ 'shape' => 'UntagResourceResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'idempotent' => true, ], 'UpdateProfilingGroup' => [ 'name' => 'UpdateProfilingGroup', 'http' => [ 'method' => 'PUT', 'requestUri' => '/profilingGroups/{profilingGroupName}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UpdateProfilingGroupRequest', ], 'output' => [ 'shape' => 'UpdateProfilingGroupResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'idempotent' => true, ], ], 'shapes' => [ 'ActionGroup' => [ 'type' => 'string', 'enum' => [ 'agentPermissions', ], ], 'AddNotificationChannelsRequest' => [ 'type' => 'structure', 'required' => [ 'channels', 'profilingGroupName', ], 'members' => [ 'channels' => [ 'shape' => 'Channels', ], 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', 'location' => 'uri', 'locationName' => 'profilingGroupName', ], ], ], 'AddNotificationChannelsResponse' => [ 'type' => 'structure', 'members' => [ 'notificationConfiguration' => [ 'shape' => 'NotificationConfiguration', ], ], ], 'AgentConfiguration' => [ 'type' => 'structure', 'required' => [ 'periodInSeconds', 'shouldProfile', ], 'members' => [ 'agentParameters' => [ 'shape' => 'AgentParameters', ], 'periodInSeconds' => [ 'shape' => 'Integer', ], 'shouldProfile' => [ 'shape' => 'Boolean', ], ], ], 'AgentOrchestrationConfig' => [ 'type' => 'structure', 'required' => [ 'profilingEnabled', ], 'members' => [ 'profilingEnabled' => [ 'shape' => 'Boolean', ], ], ], 'AgentParameterField' => [ 'type' => 'string', 'enum' => [ 'SamplingIntervalInMilliseconds', 'ReportingIntervalInMilliseconds', 'MinimumTimeForReportingInMilliseconds', 'MemoryUsageLimitPercent', 'MaxStackDepth', ], ], 'AgentParameters' => [ 'type' => 'map', 'key' => [ 'shape' => 'AgentParameterField', ], 'value' => [ 'shape' => 'String', ], ], 'AgentProfile' => [ 'type' => 'blob', ], 'AggregatedProfile' => [ 'type' => 'blob', ], 'AggregatedProfileTime' => [ 'type' => 'structure', 'members' => [ 'period' => [ 'shape' => 'AggregationPeriod', ], 'start' => [ 'shape' => 'Timestamp', ], ], ], 'AggregationPeriod' => [ 'type' => 'string', 'enum' => [ 'PT5M', 'PT1H', 'P1D', ], ], 'Anomalies' => [ 'type' => 'list', 'member' => [ 'shape' => 'Anomaly', ], ], 'Anomaly' => [ 'type' => 'structure', 'required' => [ 'instances', 'metric', 'reason', ], 'members' => [ 'instances' => [ 'shape' => 'AnomalyInstances', ], 'metric' => [ 'shape' => 'Metric', ], 'reason' => [ 'shape' => 'String', ], ], ], 'AnomalyInstance' => [ 'type' => 'structure', 'required' => [ 'id', 'startTime', ], 'members' => [ 'endTime' => [ 'shape' => 'Timestamp', ], 'id' => [ 'shape' => 'String', ], 'startTime' => [ 'shape' => 'Timestamp', ], 'userFeedback' => [ 'shape' => 'UserFeedback', ], ], ], 'AnomalyInstanceId' => [ 'type' => 'string', 'pattern' => '[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}', ], 'AnomalyInstances' => [ 'type' => 'list', 'member' => [ 'shape' => 'AnomalyInstance', ], ], 'BatchGetFrameMetricDataRequest' => [ 'type' => 'structure', 'required' => [ 'profilingGroupName', ], 'members' => [ 'endTime' => [ 'shape' => 'Timestamp', 'location' => 'querystring', 'locationName' => 'endTime', ], 'frameMetrics' => [ 'shape' => 'FrameMetrics', ], 'period' => [ 'shape' => 'Period', 'location' => 'querystring', 'locationName' => 'period', ], 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', 'location' => 'uri', 'locationName' => 'profilingGroupName', ], 'startTime' => [ 'shape' => 'Timestamp', 'location' => 'querystring', 'locationName' => 'startTime', ], 'targetResolution' => [ 'shape' => 'AggregationPeriod', 'location' => 'querystring', 'locationName' => 'targetResolution', ], ], ], 'BatchGetFrameMetricDataResponse' => [ 'type' => 'structure', 'required' => [ 'endTime', 'endTimes', 'frameMetricData', 'resolution', 'startTime', 'unprocessedEndTimes', ], 'members' => [ 'endTime' => [ 'shape' => 'Timestamp', ], 'endTimes' => [ 'shape' => 'ListOfTimestamps', ], 'frameMetricData' => [ 'shape' => 'FrameMetricData', ], 'resolution' => [ 'shape' => 'AggregationPeriod', ], 'startTime' => [ 'shape' => 'Timestamp', ], 'unprocessedEndTimes' => [ 'shape' => 'UnprocessedEndTimeMap', ], ], ], 'Boolean' => [ 'type' => 'boolean', 'box' => true, ], 'Channel' => [ 'type' => 'structure', 'required' => [ 'eventPublishers', 'uri', ], 'members' => [ 'eventPublishers' => [ 'shape' => 'EventPublishers', ], 'id' => [ 'shape' => 'ChannelId', ], 'uri' => [ 'shape' => 'ChannelUri', ], ], ], 'ChannelId' => [ 'type' => 'string', 'pattern' => '[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}', ], 'ChannelUri' => [ 'type' => 'string', ], 'Channels' => [ 'type' => 'list', 'member' => [ 'shape' => 'Channel', ], 'max' => 2, 'min' => 1, ], 'ClientToken' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '^[\\w-]+$', ], 'ComputePlatform' => [ 'type' => 'string', 'enum' => [ 'Default', 'AWSLambda', ], ], 'ConfigureAgentRequest' => [ 'type' => 'structure', 'required' => [ 'profilingGroupName', ], 'members' => [ 'fleetInstanceId' => [ 'shape' => 'FleetInstanceId', ], 'metadata' => [ 'shape' => 'Metadata', ], 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', 'location' => 'uri', 'locationName' => 'profilingGroupName', ], ], ], 'ConfigureAgentResponse' => [ 'type' => 'structure', 'required' => [ 'configuration', ], 'members' => [ 'configuration' => [ 'shape' => 'AgentConfiguration', ], ], 'payload' => 'configuration', ], 'ConflictException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 409, 'senderFault' => true, ], 'exception' => true, ], 'CreateProfilingGroupRequest' => [ 'type' => 'structure', 'required' => [ 'clientToken', 'profilingGroupName', ], 'members' => [ 'agentOrchestrationConfig' => [ 'shape' => 'AgentOrchestrationConfig', ], 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, 'location' => 'querystring', 'locationName' => 'clientToken', ], 'computePlatform' => [ 'shape' => 'ComputePlatform', ], 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', ], 'tags' => [ 'shape' => 'TagsMap', ], ], ], 'CreateProfilingGroupResponse' => [ 'type' => 'structure', 'required' => [ 'profilingGroup', ], 'members' => [ 'profilingGroup' => [ 'shape' => 'ProfilingGroupDescription', ], ], 'payload' => 'profilingGroup', ], 'DeleteProfilingGroupRequest' => [ 'type' => 'structure', 'required' => [ 'profilingGroupName', ], 'members' => [ 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', 'location' => 'uri', 'locationName' => 'profilingGroupName', ], ], ], 'DeleteProfilingGroupResponse' => [ 'type' => 'structure', 'members' => [], ], 'DescribeProfilingGroupRequest' => [ 'type' => 'structure', 'required' => [ 'profilingGroupName', ], 'members' => [ 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', 'location' => 'uri', 'locationName' => 'profilingGroupName', ], ], ], 'DescribeProfilingGroupResponse' => [ 'type' => 'structure', 'required' => [ 'profilingGroup', ], 'members' => [ 'profilingGroup' => [ 'shape' => 'ProfilingGroupDescription', ], ], 'payload' => 'profilingGroup', ], 'Double' => [ 'type' => 'double', 'box' => true, ], 'EventPublisher' => [ 'type' => 'string', 'enum' => [ 'AnomalyDetection', ], ], 'EventPublishers' => [ 'type' => 'list', 'member' => [ 'shape' => 'EventPublisher', ], 'max' => 1, 'min' => 1, ], 'FeedbackType' => [ 'type' => 'string', 'enum' => [ 'Positive', 'Negative', ], ], 'FindingsReportId' => [ 'type' => 'string', 'pattern' => '[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}', ], 'FindingsReportSummaries' => [ 'type' => 'list', 'member' => [ 'shape' => 'FindingsReportSummary', ], ], 'FindingsReportSummary' => [ 'type' => 'structure', 'members' => [ 'id' => [ 'shape' => 'FindingsReportId', ], 'profileEndTime' => [ 'shape' => 'Timestamp', ], 'profileStartTime' => [ 'shape' => 'Timestamp', ], 'profilingGroupName' => [ 'shape' => 'String', ], 'totalNumberOfFindings' => [ 'shape' => 'Integer', ], ], ], 'FleetInstanceId' => [ 'type' => 'string', 'max' => 255, 'min' => 1, ], 'FrameMetric' => [ 'type' => 'structure', 'required' => [ 'frameName', 'threadStates', 'type', ], 'members' => [ 'frameName' => [ 'shape' => 'String', ], 'threadStates' => [ 'shape' => 'ThreadStates', ], 'type' => [ 'shape' => 'MetricType', ], ], ], 'FrameMetricData' => [ 'type' => 'list', 'member' => [ 'shape' => 'FrameMetricDatum', ], ], 'FrameMetricDatum' => [ 'type' => 'structure', 'required' => [ 'frameMetric', 'values', ], 'members' => [ 'frameMetric' => [ 'shape' => 'FrameMetric', ], 'values' => [ 'shape' => 'FrameMetricValues', ], ], ], 'FrameMetricValue' => [ 'type' => 'double', 'box' => true, ], 'FrameMetricValues' => [ 'type' => 'list', 'member' => [ 'shape' => 'FrameMetricValue', ], ], 'FrameMetrics' => [ 'type' => 'list', 'member' => [ 'shape' => 'FrameMetric', ], ], 'GetFindingsReportAccountSummaryRequest' => [ 'type' => 'structure', 'members' => [ 'dailyReportsOnly' => [ 'shape' => 'Boolean', 'location' => 'querystring', 'locationName' => 'dailyReportsOnly', ], 'maxResults' => [ 'shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'nextToken' => [ 'shape' => 'PaginationToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], ], ], 'GetFindingsReportAccountSummaryResponse' => [ 'type' => 'structure', 'required' => [ 'reportSummaries', ], 'members' => [ 'nextToken' => [ 'shape' => 'PaginationToken', ], 'reportSummaries' => [ 'shape' => 'FindingsReportSummaries', ], ], ], 'GetNotificationConfigurationRequest' => [ 'type' => 'structure', 'required' => [ 'profilingGroupName', ], 'members' => [ 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', 'location' => 'uri', 'locationName' => 'profilingGroupName', ], ], ], 'GetNotificationConfigurationResponse' => [ 'type' => 'structure', 'required' => [ 'notificationConfiguration', ], 'members' => [ 'notificationConfiguration' => [ 'shape' => 'NotificationConfiguration', ], ], ], 'GetPolicyRequest' => [ 'type' => 'structure', 'required' => [ 'profilingGroupName', ], 'members' => [ 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', 'location' => 'uri', 'locationName' => 'profilingGroupName', ], ], ], 'GetPolicyResponse' => [ 'type' => 'structure', 'required' => [ 'policy', 'revisionId', ], 'members' => [ 'policy' => [ 'shape' => 'String', ], 'revisionId' => [ 'shape' => 'RevisionId', ], ], ], 'GetProfileRequest' => [ 'type' => 'structure', 'required' => [ 'profilingGroupName', ], 'members' => [ 'accept' => [ 'shape' => 'String', 'location' => 'header', 'locationName' => 'Accept', ], 'endTime' => [ 'shape' => 'Timestamp', 'location' => 'querystring', 'locationName' => 'endTime', ], 'maxDepth' => [ 'shape' => 'MaxDepth', 'location' => 'querystring', 'locationName' => 'maxDepth', ], 'period' => [ 'shape' => 'Period', 'location' => 'querystring', 'locationName' => 'period', ], 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', 'location' => 'uri', 'locationName' => 'profilingGroupName', ], 'startTime' => [ 'shape' => 'Timestamp', 'location' => 'querystring', 'locationName' => 'startTime', ], ], ], 'GetProfileResponse' => [ 'type' => 'structure', 'required' => [ 'contentType', 'profile', ], 'members' => [ 'contentEncoding' => [ 'shape' => 'String', 'location' => 'header', 'locationName' => 'Content-Encoding', ], 'contentType' => [ 'shape' => 'String', 'location' => 'header', 'locationName' => 'Content-Type', ], 'profile' => [ 'shape' => 'AggregatedProfile', ], ], 'payload' => 'profile', ], 'GetRecommendationsRequest' => [ 'type' => 'structure', 'required' => [ 'endTime', 'profilingGroupName', 'startTime', ], 'members' => [ 'endTime' => [ 'shape' => 'Timestamp', 'location' => 'querystring', 'locationName' => 'endTime', ], 'locale' => [ 'shape' => 'Locale', 'location' => 'querystring', 'locationName' => 'locale', ], 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', 'location' => 'uri', 'locationName' => 'profilingGroupName', ], 'startTime' => [ 'shape' => 'Timestamp', 'location' => 'querystring', 'locationName' => 'startTime', ], ], ], 'GetRecommendationsResponse' => [ 'type' => 'structure', 'required' => [ 'anomalies', 'profileEndTime', 'profileStartTime', 'profilingGroupName', 'recommendations', ], 'members' => [ 'anomalies' => [ 'shape' => 'Anomalies', ], 'profileEndTime' => [ 'shape' => 'Timestamp', ], 'profileStartTime' => [ 'shape' => 'Timestamp', ], 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', ], 'recommendations' => [ 'shape' => 'Recommendations', ], ], ], 'Integer' => [ 'type' => 'integer', 'box' => true, ], 'InternalServerException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, 'retryable' => [ 'throttling' => false, ], ], 'ListFindingsReportsRequest' => [ 'type' => 'structure', 'required' => [ 'endTime', 'profilingGroupName', 'startTime', ], 'members' => [ 'dailyReportsOnly' => [ 'shape' => 'Boolean', 'location' => 'querystring', 'locationName' => 'dailyReportsOnly', ], 'endTime' => [ 'shape' => 'Timestamp', 'location' => 'querystring', 'locationName' => 'endTime', ], 'maxResults' => [ 'shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'nextToken' => [ 'shape' => 'PaginationToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', 'location' => 'uri', 'locationName' => 'profilingGroupName', ], 'startTime' => [ 'shape' => 'Timestamp', 'location' => 'querystring', 'locationName' => 'startTime', ], ], ], 'ListFindingsReportsResponse' => [ 'type' => 'structure', 'required' => [ 'findingsReportSummaries', ], 'members' => [ 'findingsReportSummaries' => [ 'shape' => 'FindingsReportSummaries', ], 'nextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'ListOfTimestamps' => [ 'type' => 'list', 'member' => [ 'shape' => 'TimestampStructure', ], ], 'ListProfileTimesRequest' => [ 'type' => 'structure', 'required' => [ 'endTime', 'period', 'profilingGroupName', 'startTime', ], 'members' => [ 'endTime' => [ 'shape' => 'Timestamp', 'location' => 'querystring', 'locationName' => 'endTime', ], 'maxResults' => [ 'shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'nextToken' => [ 'shape' => 'PaginationToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'orderBy' => [ 'shape' => 'OrderBy', 'location' => 'querystring', 'locationName' => 'orderBy', ], 'period' => [ 'shape' => 'AggregationPeriod', 'location' => 'querystring', 'locationName' => 'period', ], 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', 'location' => 'uri', 'locationName' => 'profilingGroupName', ], 'startTime' => [ 'shape' => 'Timestamp', 'location' => 'querystring', 'locationName' => 'startTime', ], ], ], 'ListProfileTimesResponse' => [ 'type' => 'structure', 'required' => [ 'profileTimes', ], 'members' => [ 'nextToken' => [ 'shape' => 'PaginationToken', ], 'profileTimes' => [ 'shape' => 'ProfileTimes', ], ], ], 'ListProfilingGroupsRequest' => [ 'type' => 'structure', 'members' => [ 'includeDescription' => [ 'shape' => 'Boolean', 'location' => 'querystring', 'locationName' => 'includeDescription', ], 'maxResults' => [ 'shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'nextToken' => [ 'shape' => 'PaginationToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], ], ], 'ListProfilingGroupsResponse' => [ 'type' => 'structure', 'required' => [ 'profilingGroupNames', ], 'members' => [ 'nextToken' => [ 'shape' => 'PaginationToken', ], 'profilingGroupNames' => [ 'shape' => 'ProfilingGroupNames', ], 'profilingGroups' => [ 'shape' => 'ProfilingGroupDescriptions', ], ], ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', ], 'members' => [ 'resourceArn' => [ 'shape' => 'ProfilingGroupArn', 'location' => 'uri', 'locationName' => 'resourceArn', ], ], ], 'ListTagsForResourceResponse' => [ 'type' => 'structure', 'members' => [ 'tags' => [ 'shape' => 'TagsMap', ], ], ], 'Locale' => [ 'type' => 'string', ], 'Match' => [ 'type' => 'structure', 'members' => [ 'frameAddress' => [ 'shape' => 'String', ], 'targetFramesIndex' => [ 'shape' => 'Integer', ], 'thresholdBreachValue' => [ 'shape' => 'Double', ], ], ], 'Matches' => [ 'type' => 'list', 'member' => [ 'shape' => 'Match', ], ], 'MaxDepth' => [ 'type' => 'integer', 'box' => true, 'max' => 10000, 'min' => 1, ], 'MaxResults' => [ 'type' => 'integer', 'box' => true, 'max' => 1000, 'min' => 1, ], 'Metadata' => [ 'type' => 'map', 'key' => [ 'shape' => 'MetadataField', ], 'value' => [ 'shape' => 'String', ], ], 'MetadataField' => [ 'type' => 'string', 'enum' => [ 'ComputePlatform', 'AgentId', 'AwsRequestId', 'ExecutionEnvironment', 'LambdaFunctionArn', 'LambdaMemoryLimitInMB', 'LambdaRemainingTimeInMilliseconds', 'LambdaTimeGapBetweenInvokesInMilliseconds', 'LambdaPreviousExecutionTimeInMilliseconds', ], ], 'Metric' => [ 'type' => 'structure', 'required' => [ 'frameName', 'threadStates', 'type', ], 'members' => [ 'frameName' => [ 'shape' => 'String', ], 'threadStates' => [ 'shape' => 'Strings', ], 'type' => [ 'shape' => 'MetricType', ], ], ], 'MetricType' => [ 'type' => 'string', 'enum' => [ 'AggregatedRelativeTotalTime', ], ], 'NotificationConfiguration' => [ 'type' => 'structure', 'members' => [ 'channels' => [ 'shape' => 'Channels', ], ], ], 'OrderBy' => [ 'type' => 'string', 'enum' => [ 'TimestampDescending', 'TimestampAscending', ], ], 'PaginationToken' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '^[\\w-]+$', ], 'Pattern' => [ 'type' => 'structure', 'members' => [ 'countersToAggregate' => [ 'shape' => 'Strings', ], 'description' => [ 'shape' => 'String', ], 'id' => [ 'shape' => 'String', ], 'name' => [ 'shape' => 'String', ], 'resolutionSteps' => [ 'shape' => 'String', ], 'targetFrames' => [ 'shape' => 'TargetFrames', ], 'thresholdPercent' => [ 'shape' => 'Percentage', ], ], ], 'Percentage' => [ 'type' => 'double', 'max' => 100, 'min' => 0, ], 'Period' => [ 'type' => 'string', 'max' => 64, 'min' => 1, ], 'PostAgentProfileRequest' => [ 'type' => 'structure', 'required' => [ 'agentProfile', 'contentType', 'profilingGroupName', ], 'members' => [ 'agentProfile' => [ 'shape' => 'AgentProfile', ], 'contentType' => [ 'shape' => 'String', 'location' => 'header', 'locationName' => 'Content-Type', ], 'profileToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, 'location' => 'querystring', 'locationName' => 'profileToken', ], 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', 'location' => 'uri', 'locationName' => 'profilingGroupName', ], ], 'payload' => 'agentProfile', ], 'PostAgentProfileResponse' => [ 'type' => 'structure', 'members' => [], ], 'Principal' => [ 'type' => 'string', ], 'Principals' => [ 'type' => 'list', 'member' => [ 'shape' => 'Principal', ], 'max' => 50, 'min' => 1, ], 'ProfileTime' => [ 'type' => 'structure', 'members' => [ 'start' => [ 'shape' => 'Timestamp', ], ], ], 'ProfileTimes' => [ 'type' => 'list', 'member' => [ 'shape' => 'ProfileTime', ], ], 'ProfilingGroupArn' => [ 'type' => 'string', ], 'ProfilingGroupDescription' => [ 'type' => 'structure', 'members' => [ 'agentOrchestrationConfig' => [ 'shape' => 'AgentOrchestrationConfig', ], 'arn' => [ 'shape' => 'ProfilingGroupArn', ], 'computePlatform' => [ 'shape' => 'ComputePlatform', ], 'createdAt' => [ 'shape' => 'Timestamp', ], 'name' => [ 'shape' => 'ProfilingGroupName', ], 'profilingStatus' => [ 'shape' => 'ProfilingStatus', ], 'tags' => [ 'shape' => 'TagsMap', ], 'updatedAt' => [ 'shape' => 'Timestamp', ], ], ], 'ProfilingGroupDescriptions' => [ 'type' => 'list', 'member' => [ 'shape' => 'ProfilingGroupDescription', ], ], 'ProfilingGroupName' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[\\w-]+$', ], 'ProfilingGroupNames' => [ 'type' => 'list', 'member' => [ 'shape' => 'ProfilingGroupName', ], ], 'ProfilingStatus' => [ 'type' => 'structure', 'members' => [ 'latestAgentOrchestratedAt' => [ 'shape' => 'Timestamp', ], 'latestAgentProfileReportedAt' => [ 'shape' => 'Timestamp', ], 'latestAggregatedProfile' => [ 'shape' => 'AggregatedProfileTime', ], ], ], 'PutPermissionRequest' => [ 'type' => 'structure', 'required' => [ 'actionGroup', 'principals', 'profilingGroupName', ], 'members' => [ 'actionGroup' => [ 'shape' => 'ActionGroup', 'location' => 'uri', 'locationName' => 'actionGroup', ], 'principals' => [ 'shape' => 'Principals', ], 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', 'location' => 'uri', 'locationName' => 'profilingGroupName', ], 'revisionId' => [ 'shape' => 'RevisionId', ], ], ], 'PutPermissionResponse' => [ 'type' => 'structure', 'required' => [ 'policy', 'revisionId', ], 'members' => [ 'policy' => [ 'shape' => 'String', ], 'revisionId' => [ 'shape' => 'RevisionId', ], ], ], 'Recommendation' => [ 'type' => 'structure', 'required' => [ 'allMatchesCount', 'allMatchesSum', 'endTime', 'pattern', 'startTime', 'topMatches', ], 'members' => [ 'allMatchesCount' => [ 'shape' => 'Integer', ], 'allMatchesSum' => [ 'shape' => 'Double', ], 'endTime' => [ 'shape' => 'Timestamp', ], 'pattern' => [ 'shape' => 'Pattern', ], 'startTime' => [ 'shape' => 'Timestamp', ], 'topMatches' => [ 'shape' => 'Matches', ], ], ], 'Recommendations' => [ 'type' => 'list', 'member' => [ 'shape' => 'Recommendation', ], ], 'RemoveNotificationChannelRequest' => [ 'type' => 'structure', 'required' => [ 'channelId', 'profilingGroupName', ], 'members' => [ 'channelId' => [ 'shape' => 'ChannelId', 'location' => 'uri', 'locationName' => 'channelId', ], 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', 'location' => 'uri', 'locationName' => 'profilingGroupName', ], ], ], 'RemoveNotificationChannelResponse' => [ 'type' => 'structure', 'members' => [ 'notificationConfiguration' => [ 'shape' => 'NotificationConfiguration', ], ], ], 'RemovePermissionRequest' => [ 'type' => 'structure', 'required' => [ 'actionGroup', 'profilingGroupName', 'revisionId', ], 'members' => [ 'actionGroup' => [ 'shape' => 'ActionGroup', 'location' => 'uri', 'locationName' => 'actionGroup', ], 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', 'location' => 'uri', 'locationName' => 'profilingGroupName', ], 'revisionId' => [ 'shape' => 'RevisionId', 'location' => 'querystring', 'locationName' => 'revisionId', ], ], ], 'RemovePermissionResponse' => [ 'type' => 'structure', 'required' => [ 'policy', 'revisionId', ], 'members' => [ 'policy' => [ 'shape' => 'String', ], 'revisionId' => [ 'shape' => 'RevisionId', ], ], ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 404, 'senderFault' => true, ], 'exception' => true, ], 'RevisionId' => [ 'type' => 'string', 'pattern' => '[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}', ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 402, 'senderFault' => true, ], 'exception' => true, 'retryable' => [ 'throttling' => false, ], ], 'String' => [ 'type' => 'string', ], 'Strings' => [ 'type' => 'list', 'member' => [ 'shape' => 'String', ], ], 'SubmitFeedbackRequest' => [ 'type' => 'structure', 'required' => [ 'anomalyInstanceId', 'profilingGroupName', 'type', ], 'members' => [ 'anomalyInstanceId' => [ 'shape' => 'AnomalyInstanceId', 'location' => 'uri', 'locationName' => 'anomalyInstanceId', ], 'comment' => [ 'shape' => 'String', ], 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', 'location' => 'uri', 'locationName' => 'profilingGroupName', ], 'type' => [ 'shape' => 'FeedbackType', ], ], ], 'SubmitFeedbackResponse' => [ 'type' => 'structure', 'members' => [], ], 'TagKeys' => [ 'type' => 'list', 'member' => [ 'shape' => 'String', ], ], 'TagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tags', ], 'members' => [ 'resourceArn' => [ 'shape' => 'ProfilingGroupArn', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tags' => [ 'shape' => 'TagsMap', ], ], ], 'TagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'TagsMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'String', ], 'value' => [ 'shape' => 'String', ], ], 'TargetFrame' => [ 'type' => 'list', 'member' => [ 'shape' => 'String', ], ], 'TargetFrames' => [ 'type' => 'list', 'member' => [ 'shape' => 'TargetFrame', ], ], 'ThreadStates' => [ 'type' => 'list', 'member' => [ 'shape' => 'String', ], ], 'ThrottlingException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 429, 'senderFault' => true, ], 'exception' => true, 'retryable' => [ 'throttling' => false, ], ], 'Timestamp' => [ 'type' => 'timestamp', 'timestampFormat' => 'iso8601', ], 'TimestampStructure' => [ 'type' => 'structure', 'required' => [ 'value', ], 'members' => [ 'value' => [ 'shape' => 'Timestamp', ], ], ], 'UnprocessedEndTimeMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'String', ], 'value' => [ 'shape' => 'ListOfTimestamps', ], ], 'UntagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tagKeys', ], 'members' => [ 'resourceArn' => [ 'shape' => 'ProfilingGroupArn', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tagKeys' => [ 'shape' => 'TagKeys', 'location' => 'querystring', 'locationName' => 'tagKeys', ], ], ], 'UntagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateProfilingGroupRequest' => [ 'type' => 'structure', 'required' => [ 'agentOrchestrationConfig', 'profilingGroupName', ], 'members' => [ 'agentOrchestrationConfig' => [ 'shape' => 'AgentOrchestrationConfig', ], 'profilingGroupName' => [ 'shape' => 'ProfilingGroupName', 'location' => 'uri', 'locationName' => 'profilingGroupName', ], ], ], 'UpdateProfilingGroupResponse' => [ 'type' => 'structure', 'required' => [ 'profilingGroup', ], 'members' => [ 'profilingGroup' => [ 'shape' => 'ProfilingGroupDescription', ], ], 'payload' => 'profilingGroup', ], 'UserFeedback' => [ 'type' => 'structure', 'required' => [ 'type', ], 'members' => [ 'type' => [ 'shape' => 'FeedbackType', ], ], ], 'ValidationException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], ],];
