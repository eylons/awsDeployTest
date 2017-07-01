# Deploy website MZ RDS Assignment

Example of LAMP website deployed in two Autoscaling AZ controlled by a ELB, 
and reading from RDS Mysql DB

## How it works

The shell script will activate aws cli command that will send a cloudFormation template,
the template will create all the components needed in the AWS, the needed security groups,
and will create the DB and get the latest code from git. 
(in this case index.php which read from the DB).

### Prerequisites

- On the deploying computer:
- pem file to access AWS account
- AWS cli installed (pip install --upgrade awscli) and configured to access the correct region (e.g.: us-east-1)
- The files from the Github repository
```
createStackScript.sh
createStackScriptParams.json
stackTemplateLampAZ.json
```

### Installing

On the local computer edit createStackScriptParams.json - Add the two TODO passwords
There is option to add additional params like Instance type, RDS MZ and SSH location
Open terminal from the project directory
Run the createStackScript.sh from the shell
Installation might take few minutes and it will be busy till complete
You will be prompt of the website URL
Or you can :
Login to https://console.aws.amazon.com/cloudformation to watch the events or outputs tab

### When done

Wait few minutes to let the instances finish init and open a browser with this URL.
You should get an HTML page which show 'John', 'Doe', 'john@example.com' at least once.  


## What is missing

SSL
CloudFormation WaitGroup till instances installation will be done
Ensure httpd is running
Test in the end of deployment that we get the correct result from the DB, alert if not


## Why I choose this solution

Cloud formation is very comfortable way to version the infrastructure setup
It can be maintain without coding
Main disadvantages are that it will not work on other clouds and that it sometimes hides 
the real causes of errors


## Improvements I would like to do

VPC with subnets to better control security
In complex website different subnets and security groups for model, view, controller
Better git schema (separate MVC, CloudFormation templates, etc..) 
In complex libs dependencies use Docker
Use infrastructure tools (Terraform)
Use deployment tools (Chef, Ansible....)
Add alerts and monitoring tools (dynatrace)
Store static website data in cloudFront
Use ElasticCache
Database and tables creation and update should be done in more generic way using code
Website domain name (using route53)
Limit the SSH for specific IP
Size of Instances should be considered according requirements


### Uninstalling

Login to AWS console, Go to ClouFormation, Choose the stackLampAZ stack and delete.







