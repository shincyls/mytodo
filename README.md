<h2>This Is a Simple Todo List Project</h2>

<hr>

<h5>Github</h5>

Using PHP Composer 
1) https://github.com/shincyls/mytodo
2) use cmd to run: php laravel serve

<hr>

<h5>Docker</h5>

Using Docker to Run
1) docker pull shincyls/mytodo:test5
2) docker compose up

<hr>

<h5>Instruction</h5>

Once the App Is Up

1) Browse "http://localhost:8080/api/login/google" in any Internet Browser to Sign-Up as app user

2) Once selected your gmail, click sign-in and wait for callback response.
Copy the value of <access_token>, this value will be the value of {YOUR_AUTH_TOKEN}

3) Once laravel server is up. Use command as below in windows' cmd/powershell OR linux's terminal to perform CRUD actions as belows:

a) To List All Todo Items
curl -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" http://localhost:8080/todos

Example: 


b) Select 1 Todo Item by Id
curl -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" http://localhost:8080/todos/{id}

Example: 

   
c) To Add a Todo Item
curl -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" http://localhost:8080/todos/create -X POST 
-d 'title={TASK_TITLE}&description={TASK_DESCRIPTION}&due_date={TASK_DUE_DATE}'

{TASK_TITLE}? task title
{TASK_DESCRIPTION}? task description
{TASK_DUE_DATE}? date format in yyyy-mm-dd

Example: 


d) To Mark a Todo Item as Completed
curl -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" http://localhost:8080/todos/{id}/done -X PUT

{id}? id of todo item, you can view it with command (i)
Example: 

e) To Remove a Todo Item
curl -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" http://localhost:8080/todos/{id} -X DELETE

{id}? id of todo item, you can view it with command (i)
Example: 
 
