<h2>This Is a Simple Todo List Project</h2>

<hr>

<h5>GITHUB</h5>

Using PHP Composer 
1) https://github.com/shincyls/mytodo
2) use cmd to run: php laravel serve

<hr>

<h5>DOCKER</h5>

Using Docker to Run
1) docker pull shincyls/mytodo:test5
2) docker compose up
OR
1) run with docker desktop with host port 8080:80

<hr>

<h5>INSTRUCTION</h5>

<ul>
<li>
1) Browse "http://localhost:8080/api/login/google" in any Internet Browser to Sign-Up as app user
</li>
<li>
2) Once selected your gmail, click sign-in and wait for callback response.
Copy the value of "access_token", copy this value as for {YOUR_AUTH_TOKEN}
</li>
<li>
3) Open CMD
   
<u>a) To List All Todo Items</u>
curl -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" http://localhost:8080/todos

<u>b) Select single Todo Item by Id</u>
curl -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" http://localhost:8080/todos/{id}

<u>c) To Add a Todo Item</u>
curl -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" http://localhost:8080/todos/create -X POST 
-d "title={TASK_TITLE}&description={TASK_DESCRIPTION}&due_date={TASK_DUE_DATE}"

{TASK_TITLE}? task title
{TASK_DESCRIPTION}? task description
{TASK_DUE_DATE}? date format in yyyy-mm-dd

<u>d) To Mark a Todo Item as Completed
curl -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" http://localhost:8080/todos/{id}/done -X PUT

{id}? id of todo item, you can view it with command (i) (Refer to List All Todo Items)

<u>e) To Remove a Todo Item</u>
curl -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" http://localhost:8080/todos/{id} -X DELETE

{id}? id of todo item, you can view it with command (i) (Refer to List All Todo Items)

</li>
</ul>

