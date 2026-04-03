# Laravel Forms & Session Activity - Reflection

### Task 1: Understanding the Flow
When the user types an email and submits it, the form sends it to the server using POST. The server checks first if the email is valid and not empty. Then it checks if the email is already in the list or if there are already 5 emails saved. If everything is okay, the email gets saved in the session. After that, the page reloads and shows the updated list of emails.


### Reflection Questions

* **What is the difference between GET and POST?**
  * GET is used to retrieve or load data, like opening a page. POST is used to send data to the server, like submitting a form.

* **Why do we use @csrf in forms?**
  * It helps protect the form by making sure the request is coming from the real user and not from a malicious source.

* **What is session used for in this activity?**
  * Session is used to temporarily store the emails so they can still be shown after the page reloads without using a database.

* **What happens if session is cleared?**
  * All stored emails will be deleted, and the list will become empty.