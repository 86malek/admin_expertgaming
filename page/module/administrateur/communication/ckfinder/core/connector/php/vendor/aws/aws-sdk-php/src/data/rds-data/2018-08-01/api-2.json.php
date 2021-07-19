<?php
// This file was auto-generated from sdk-root/src/data/rds-data/2018-08-01/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2018-08-01', 'endpointPrefix' => 'rds-data', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceFullName' => 'AWS RDS DataService', 'serviceId' => 'RDS Data', 'signatureVersion' => 'v4', 'signingName' => 'rds-data', 'uid' => 'rds-data-2018-08-01', ], 'operations' => [ 'BatchExecuteStatement' => [ 'name' => 'BatchExecuteStatement', 'http' => [ 'method' => 'POST', 'requestUri' => '/BatchExecute', 'responseCode' => 200, ], 'input' => [ 'shape' => 'BatchExecuteStatementRequest', ], 'output' => [ 'shape' => 'BatchExecuteStatementResponse', ], 'errors' => [ [ 'shape' => 'BadRequestException', ], [ 'shape' => 'StatementTimeoutException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'ForbiddenException', ], [ 'shape' => 'ServiceUnavailableError', ], ], ], 'BeginTransaction' => [ 'name' => 'BeginTransaction', 'http' => [ 'method' => 'POST', 'requestUri' => '/BeginTransaction', 'responseCode' => 200, ], 'input' => [ 'shape' => 'BeginTransactionRequest', ], 'output' => [ 'shape' => 'BeginTransactionResponse', ], 'errors' => [ [ 'shape' => 'BadRequestException', ], [ 'shape' => 'StatementTimeoutException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'ForbiddenException', ], [ 'shape' => 'ServiceUnavailableError', ], ], ], 'CommitTransaction' => [ 'name' => 'CommitTransaction', 'http' => [ 'method' => 'POST', 'requestUri' => '/CommitTransaction', 'responseCode' => 200, ], 'input' => [ 'shape' => 'CommitTransactionRequest', ], 'output' => [ 'shape' => 'CommitTransactionResponse', ], 'errors' => [ [ 'shape' => 'BadRequestException', ], [ 'shape' => 'StatementTimeoutException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'ForbiddenException', ], [ 'shape' => 'ServiceUnavailableError', ], [ 'shape' => 'NotFoundException', ], ], ], 'ExecuteSql' => [ 'name' => 'ExecuteSql', 'http' => [ 'method' => 'POST', 'requestUri' => '/ExecuteSql', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ExecuteSqlRequest', ], 'output' => [ 'shape' => 'ExecuteSqlResponse', ], 'errors' => [ [ 'shape' => 'BadRequestException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'ForbiddenException', ], [ 'shape' => 'ServiceUnavailableError', ], ], 'deprecated' => true, 'deprecatedMessage' => 'The ExecuteSql API is deprecated, please use the ExecuteStatement API.', ], 'ExecuteStatement' => [ 'name' => 'ExecuteStatement', 'http' => [ 'method' => 'POST', 'requestUri' => '/Execute', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ExecuteStatementRequest', ], 'output' => [ 'shape' => 'ExecuteStatementResponse', ], 'errors' => [ [ 'shape' => 'BadRequestException', ], [ 'shape' => 'StatementTimeoutException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'ForbiddenException', ], [ 'shape' => 'ServiceUnavailableError', ], ], ], 'RollbackTransaction' => [ 'name' => 'RollbackTransaction', 'http' => [ 'method' => 'POST', 'requestUri' => '/RollbackTransaction', 'responseCode' => 200, ], 'input' => [ 'shape' => 'RollbackTransactionRequest', ], 'output' => [ 'shape' => 'RollbackTransactionResponse', ], 'errors' => [ [ 'shape' => 'BadRequestException', ], [ 'shape' => 'StatementTimeoutException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'ForbiddenException', ], [ 'shape' => 'ServiceUnavailableError', ], [ 'shape' => 'NotFoundException', ], ], ], ], 'shapes' => [ 'Arn' => [ 'type' => 'string', 'max' => 100, 'min' => 11, ], 'ArrayOfArray' => [ 'type' => 'list', 'member' => [ 'shape' => 'ArrayValue', ], ], 'ArrayValue' => [ 'type' => 'structure', 'members' => [ 'arrayValues' => [ 'shape' => 'ArrayOfArray', ], 'booleanValues' => [ 'shape' => 'BooleanArray', ], 'doubleValues' => [ 'shape' => 'DoubleArray', ], 'longValues' => [ 'shape' => 'LongArray', ], 'stringValues' => [ 'shape' => 'StringArray', ], ], 'union' => true, ], 'ArrayValueList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Value', ], ], 'BadRequestException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'BatchExecuteStatementRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'secretArn', 'sql', ], 'members' => [ 'database' => [ 'shape' => 'DbName', ], 'parameterSets' => [ 'shape' => 'SqlParameterSets', ], 'resourceArn' => [ 'shape' => 'Arn', ], 'schema' => [ 'shape' => 'DbName', ], 'secretArn' => [ 'shape' => 'Arn', ], 'sql' => [ 'shape' => 'SqlStatement', ], 'transactionId' => [ 'shape' => 'Id', ], ], ], 'BatchExecuteStatementResponse' => [ 'type' => 'structure', 'members' => [ 'updateResults' => [ 'shape' => 'UpdateResults', ], ], ], 'BeginTransactionRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'secretArn', ], 'members' => [ 'database' => [ 'shape' => 'DbName', ], 'resourceArn' => [ 'shape' => 'Arn', ], 'schema' => [ 'shape' => 'DbName', ], 'secretArn' => [ 'shape' => 'Arn', ], ], ], 'BeginTransactionResponse' => [ 'type' => 'structure', 'members' => [ 'transactionId' => [ 'shape' => 'Id', ], ], ], 'Blob' => [ 'type' => 'blob', ], 'Boolean' => [ 'type' => 'boolean', ], 'BooleanArray' => [ 'type' => 'list', 'member' => [ 'shape' => 'BoxedBoolean', ], ], 'BoxedBoolean' => [ 'type' => 'boolean', 'box' => true, ], 'BoxedDouble' => [ 'type' => 'double', 'box' => true, ], 'BoxedFloat' => [ 'type' => 'float', 'box' => true, ], 'BoxedInteger' => [ 'type' => 'integer', 'box' => true, ], 'BoxedLong' => [ 'type' => 'long', 'box' => true, ], 'ColumnMetadata' => [ 'type' => 'structure', 'members' => [ 'arrayBaseColumnType' => [ 'shape' => 'Integer', ], 'isAutoIncrement' => [ 'shape' => 'Boolean', ], 'isCaseSensitive' => [ 'shape' => 'Boolean', ], 'isCurrency' => [ 'shape' => 'Boolean', ], 'isSigned' => [ 'shape' => 'Boolean', ], 'label' => [ 'shape' => 'String', ], 'name' => [ 'shape' => 'String', ], 'nullable' => [ 'shape' => 'Integer', ], 'precision' => [ 'shape' => 'Integer', ], 'scale' => [ 'shape' => 'Integer', ], 'schemaName' => [ 'shape' => 'String', ], 'tableName' => [ 'shape' => 'String', ], 'type' => [ 'shape' => 'Integer', ], 'typeName' => [ 'shape' => 'String', ], ], ], 'CommitTransactionRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'secretArn', 'transactionId', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', ], 'secretArn' => [ 'shape' => 'Arn', ], 'transactionId' => [ 'shape' => 'Id', ], ], ], 'CommitTransactionResponse' => [ 'type' => 'structure', 'members' => [ 'transactionStatus' => [ 'shape' => 'TransactionStatus', ], ], ], 'DbName' => [ 'type' => 'string', 'max' => 64, 'min' => 0, ], 'DecimalReturnType' => [ 'type' => 'string', 'enum' => [ 'STRING', 'DOUBLE_OR_LONG', ], ], 'DoubleArray' => [ 'type' => 'list', 'member' => [ 'shape' => 'BoxedDouble', ], ], 'ErrorMessage' => [ 'type' => 'string', ], 'ExecuteSqlRequest' => [ 'type' => 'structure', 'required' => [ 'awsSecretStoreArn', 'dbClusterOrInstanceArn', 'sqlStatements', ], 'members' => [ 'awsSecretStoreArn' => [ 'shape' => 'Arn', ], 'database' => [ 'shape' => 'DbName', ], 'dbClusterOrInstanceArn' => [ 'shape' => 'Arn', ], 'schema' => [ 'shape' => 'DbName', ], 'sqlStatements' => [ 'shape' => 'SqlStatement', ], ], ], 'ExecuteSqlResponse' => [ 'type' => 'structure', 'members' => [ 'sqlStatementResults' => [ 'shape' => 'SqlStatementResults', ], ], ], 'ExecuteStatementRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'secretArn', 'sql', ], 'members' => [ 'continueAfterTimeout' => [ 'shape' => 'Boolean', ], 'database' => [ 'shape' => 'DbName', ], 'includeResultMetadata' => [ 'shape' => 'Boolean', ], 'parameters' => [ 'shape' => 'SqlParametersList', ], 'resourceArn' => [ 'shape' => 'Arn', ], 'resultSetOptions' => [ 'shape' => 'ResultSetOptions', ], 'schema' => [ 'shape' => 'DbName', ], 'secretArn' => [ 'shape' => 'Arn', ], 'sql' => [ 'shape' => 'SqlStatement', ], 'transactionId' => [ 'shape' => 'Id', ], ], ], 'ExecuteStatementResponse' => [ 'type' => 'structure', 'members' => [ 'columnMetadata' => [ 'shape' => 'Metadata', ], 'generatedFields' => [ 'shape' => 'FieldList', ], 'numberOfRecordsUpdated' => [ 'shape' => 'RecordsUpdated', ], 'records' => [ 'shape' => 'SqlRecords', ], ], ], 'Field' => [ 'type' => 'structure', 'members' => [ 'arrayValue' => [ 'shape' => 'ArrayValue', ], 'blobValue' => [ 'shape' => 'Blob', ], 'booleanValue' => [ 'shape' => 'BoxedBoolean', ], 'doubleValue' => [ 'shape' => 'BoxedDouble', ], 'isNull' => [ 'shape' => 'BoxedBoolean', ], 'longValue' => [ 'shape' => 'BoxedLong', ], 'stringValue' => [ 'shape' => 'String', ], ], 'union' => true, ], 'FieldList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Field', ], ], 'ForbiddenException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 403, 'senderFault' => true, ], 'exception' => true, ], 'Id' => [ 'type' => 'string', 'max' => 192, 'min' => 0, ], 'Integer' => [ 'type' => 'integer', ], 'InternalServerErrorException' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, ], 'Long' => [ 'type' => 'long', ], 'LongArray' => [ 'type' => 'list', 'member' => [ 'shape' => 'BoxedLong', ], ], 'Metadata' => [ 'type' => 'list', 'member' => [ 'shape' => 'ColumnMetadata', ], ], 'NotFoundException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 404, 'senderFault' => true, ], 'exception' => true, ], 'ParameterName' => [ 'type' => 'string', ], 'Record' => [ 'type' => 'structure', 'members' => [ 'values' => [ 'shape' => 'Row', ], ], ], 'Records' => [ 'type' => 'list', 'member' => [ 'shape' => 'Record', ], ], 'RecordsUpdated' => [ 'type' => 'long', ], 'ResultFrame' => [ 'type' => 'structure', 'members' => [ 'records' => [ 'shape' => 'Records', ], 'resultSetMetadata' => [ 'shape' => 'ResultSetMetadata', ], ], ], 'ResultSetMetadata' => [ 'type' => 'structure', 'members' => [ 'columnCount' => [ 'shape' => 'Long', ], 'columnMetadata' => [ 'shape' => 'Metadata', ], ], ], 'ResultSetOptions' => [ 'type' => 'structure', 'members' => [ 'decimalReturnType' => [ 'shape' => 'DecimalReturnType', ], ], ], 'RollbackTransactionRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'secretArn', 'transactionId', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', ], 'secretArn' => [ 'shape' => 'Arn', ], 'transactionId' => [ 'shape' => 'Id', ], ], ], 'RollbackTransactionResponse' => [ 'type' => 'structure', 'members' => [ 'transactionStatus' => [ 'shape' => 'TransactionStatus', ], ], ], 'Row' => [ 'type' => 'list', 'member' => [ 'shape' => 'Value', ], ], 'ServiceUnavailableError' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'httpStatusCode' => 503, ], 'exception' => true, 'fault' => true, ], 'SqlParameter' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'ParameterName', ], 'typeHint' => [ 'shape' => 'TypeHint', ], 'value' => [ 'shape' => 'Field', ], ], ], 'SqlParameterSets' => [ 'type' => 'list', 'member' => [ 'shape' => 'SqlParametersList', ], ], 'SqlParametersList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SqlParameter', ], ], 'SqlRecords' => [ 'type' => 'list', 'member' => [ 'shape' => 'FieldList', ], ], 'SqlStatement' => [ 'type' => 'string', 'max' => 65536, 'min' => 0, ], 'SqlStatementResult' => [ 'type' => 'structure', 'members' => [ 'numberOfRecordsUpdated' => [ 'shape' => 'RecordsUpdated', ], 'resultFrame' => [ 'shape' => 'ResultFrame', ], ], ], 'SqlStatementResults' => [ 'type' => 'list', 'member' => [ 'shape' => 'SqlStatementResult', ], ], 'StatementTimeoutException' => [ 'type' => 'structure', 'members' => [ 'dbConnectionId' => [ 'shape' => 'Long', ], 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'String' => [ 'type' => 'string', ], 'StringArray' => [ 'type' => 'list', 'member' => [ 'shape' => 'String', ], ], 'StructValue' => [ 'type' => 'structure', 'members' => [ 'attributes' => [ 'shape' => 'ArrayValueList', ], ], ], 'TransactionStatus' => [ 'type' => 'string', 'max' => 128, 'min' => 0, ], 'TypeHint' => [ 'type' => 'string', 'enum' => [ 'JSON', 'UUID', 'TIMESTAMP', 'DATE', 'TIME', 'DECIMAL', ], ], 'UpdateResult' => [ 'type' => 'structure', 'members' => [ 'generatedFields' => [ 'shape' => 'FieldList', ], ], ], 'UpdateResults' => [ 'type' => 'list', 'member' => [ 'shape' => 'UpdateResult', ], ], 'Value' => [ 'type' => 'structure', 'members' => [ 'arrayValues' => [ 'shape' => 'ArrayValueList', ], 'bigIntValue' => [ 'shape' => 'BoxedLong', ], 'bitValue' => [ 'shape' => 'BoxedBoolean', ], 'blobValue' => [ 'shape' => 'Blob', ], 'doubleValue' => [ 'shape' => 'BoxedDouble', ], 'intValue' => [ 'shape' => 'BoxedInteger', ], 'isNull' => [ 'shape' => 'BoxedBoolean', ], 'realValue' => [ 'shape' => 'BoxedFloat', ], 'stringValue' => [ 'shape' => 'String', ], 'structValue' => [ 'shape' => 'StructValue', ], ], 'union' => true, ], ],];
