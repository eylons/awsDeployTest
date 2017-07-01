# This script will create a LAMP installation on AWS
# MZ, RDS

# Make sure you fill your keyName and passwords in the param json file 
# createStackScriptParams

# Validate template
aws cloudformation validate-template --template-body file://./stackTemplateLampAZ.json

# Install
aws cloudformation create-stack --stack-name stackLampAZ --template-body file://./stackTemplateLampAZ.json  --parameters file://./createStackScriptParams.json

# List events example
aws cloudformation describe-stack-events --stack-name stackLampAZ

# Busy wait till state of stack is complete
aws cloudformation wait stack-create-complete --stack-name stackLampAZ
