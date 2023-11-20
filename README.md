<h2>This Is a Simple Todo List Project</h2>

<hr>

<h5>GITHUB</h5>

To Clone Project 
1) git clone https://github.com/shincyls/mytodo.git

<hr>

<h5>DOCKER</h5>

Using Docker to Run
1) docker pull shincyls/mytodo:test5
2) docker compose up
OR
1) Run with docker desktop
2) Search "shincyls/mytodo:test5" and Pull/Download the Container 
3) Run containers with host port 8080:80

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
   
<u>a) To List All Todo Items</u><br>
curl -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" http://localhost:8080/todos<br>

<u>b) Select single Todo Item by Id</u><br>
curl -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" http://localhost:8080/todos/{id}<br>

<u>c) To Add a Todo Item</u><br>
curl -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" http://localhost:8080/todos/create -X POST 
-d "title={TASK_TITLE}&description={TASK_DESCRIPTION}&due_date={TASK_DUE_DATE}"<br>

{TASK_TITLE}? task title<br>
{TASK_DESCRIPTION}? task description<br>
{TASK_DUE_DATE}? date format in yyyy-mm-dd<br>

<u>d) To Mark a Todo Item as Completed<br>
curl -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" http://localhost:8080/todos/{id}/done -X PUT<br>

{id}? id of todo item, you can view it with command (i) (Refer to List All Todo Items)<br>

<u>e) To Remove a Todo Item</u><br>
curl -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" http://localhost:8080/todos/{id} -X DELETE<br>

{id}? id of todo item, you can view it with command (i) (Refer to List All Todo Items)<br>

</li>
</ul>

