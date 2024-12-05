<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">API Documentation</h1>

        <div class="alert alert-info">
            <strong>Note:</strong> All API requests must include the following header:
            <pre><code>Accept: application/json</code></pre>
        </div>

        <div class="accordion" id="apiDocsAccordion">
            <!-- Signup -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSignup">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSignup" aria-expanded="false" aria-controls="collapseSignup">
                        Signup
                    </button>
                </h2>
                <div id="collapseSignup" class="accordion-collapse collapse show" aria-labelledby="headingSignup"
                    data-bs-parent="#apiDocsAccordion">
                    <div class="accordion-body">
                        <h5>POST /api/signup</h5>
                        <p>Create a new user account.</p>
                        <h6>Request Body:</h6>
                        <pre><code>{
    "name": "required|string|max:255|min:3|unique:users,name|regex:/^\S*$/",
    "email": "required|email|unique:users,email",
    "password": "required|min:8|confirmed"
}</code></pre>
                        <h6>Validation Details:</h6>
                        <ul>
                            <li><strong>name:</strong> Must be a string between 3 and 255 characters. The name must be
                                unique in the users table and cannot contain spaces (no spaces allowed).</li>
                            <li><strong>email:</strong> Must be a valid email address and unique in the users table.
                            </li>
                            <li><strong>password:</strong> Must be at least 8 characters long and must be confirmed by
                                providing a matching password_confirmation field.</li>
                        </ul>
                        <h6>Response:</h6>
                        <pre><code>{
    "status": true,
    "message": "User created successfully! Verify your Email",
    "user": {...},
    "access_token": "...",
    "token_type": "Bearer"
}</code></pre>
                    </div>
                </div>
            </div>

            <!-- Login -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingLogin">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseLogin" aria-expanded="false" aria-controls="collapseLogin">
                        Login
                    </button>
                </h2>
                <div id="collapseLogin" class="accordion-collapse collapse" aria-labelledby="headingLogin"
                    data-bs-parent="#apiDocsAccordion">
                    <div class="accordion-body">
                        <h5>POST /api/login</h5>
                        <p>Login an existing user.</p>
                        <h6>Request Body:</h6>
                        <pre><code>{
    "name": "required",
    "password": "required|min:8"
}</code></pre>
                        <h6>Validation Details:</h6>
                        <ul>
                            <li><strong>name:</strong> Can be either the username or email address of the user.</li>
                            <li><strong>password:</strong> Must be at least 8 characters long.</li>
                        </ul>
                        <h6>Response:</h6>
                        <pre><code>{
    "status": true,
    "message": "User logged in successfully!",
    "user": {...},
    "access_token": "...",
    "token_type": "Bearer"
}</code></pre>
                    </div>
                </div>
            </div>

            <!-- Logout -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingLogout">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseLogout" aria-expanded="false" aria-controls="collapseLogout">
                        Logout
                    </button>
                </h2>
                <div id="collapseLogout" class="accordion-collapse collapse" aria-labelledby="headingLogout"
                    data-bs-parent="#apiDocsAccordion">
                    <div class="accordion-body">
                        <h5>POST /api/logout</h5>
                        <p>Logout the currently authenticated user.</p>
                        <h6>Response:</h6>
                        <pre><code>{
    "status": true,
    "message": "User logged out successfully!"
}</code></pre>
                    </div>
                </div>
            </div>

            <!-- Resend Email Verification -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingResendVerification">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseResendVerification" aria-expanded="false"
                        aria-controls="collapseResendVerification">
                        Resend Email Verification
                    </button>
                </h2>
                <div id="collapseResendVerification" class="accordion-collapse collapse"
                    aria-labelledby="headingResendVerification" data-bs-parent="#apiDocsAccordion">
                    <div class="accordion-body">
                        <h5>POST /api/email/resend-verification</h5>
                        <p>Resend the email verification link.</p>
                        <h6>Response:</h6>
                        <pre><code>{
    "status": true,
    "message": "A new verification link has been sent to the email address you provided during registration."
}</code></pre>
                    </div>
                </div>
            </div>

            <!-- Password Reset Request -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingResetPassword">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseResetPassword" aria-expanded="false"
                        aria-controls="collapseResetPassword">
                        Request Password Reset
                    </button>
                </h2>
                <div id="collapseResetPassword" class="accordion-collapse collapse"
                    aria-labelledby="headingResetPassword" data-bs-parent="#apiDocsAccordion">
                    <div class="accordion-body">
                        <h5>POST /api/reset-password</h5>
                        <p>Request a password reset link.</p>
                        <h6>Request Body:</h6>
                        <pre><code>{
    "email": "required|email"
}</code></pre>
                        <h6>Validation Details:</h6>
                        <ul>
                            <li><strong>email:</strong> Must be a valid email address.</li>
                        </ul>
                        <h6>Response:</h6>
                        <pre><code>{
    "status": true,
    "message": "Password reset link sent. Please check your email."
}</code></pre>
                    </div>
                </div>
            </div>

            <div class="accordion" id="apiDocsAccordion">

                <!-- GET /chats Route -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingGetChats">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseGetChats" aria-expanded="false" aria-controls="collapseGetChats">
                            Chats
                        </button>
                    </h2>
                    <div id="collapseGetChats" class="accordion-collapse collapse" aria-labelledby="headingGetChats"
                        data-bs-parent="#apiDocsAccordion">
                        <div class="accordion-body">
                            <h5>GET /chats</h5>
                            <p>Retrieve the user's chat with messages.</p>
                            <h6>Parameters:</h6>
                            <p>No parameters required.</p>
                            <h6>Response:</h6>
                            <pre><code>{
                "success": true,
                "chat": {
                    "id": 1,
                    "title": "Chat Title",
                    "messages": [
                        {
                            "id": 1,
                            "message": "Hello",
                            "sender": "user"
                        },
                        {
                            "id": 2,
                            "message": "Hi there!",
                            "sender": "tutor"
                        }
                    ]
                }
            }</code></pre>
                            <h6>Error Response:</h6>
                            <pre><code>{
                "success": false,
                "message": "No chat found for the user."
            }</code></pre>
                        </div>
                    </div>
                </div>

                <!-- POST /chats Route -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingPostChats">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapsePostChats" aria-expanded="false"
                            aria-controls="collapsePostChats">
                            Create chat or add message
                        </button>
                    </h2>
                    <div id="collapsePostChats" class="accordion-collapse collapse"
                        aria-labelledby="headingPostChats" data-bs-parent="#apiDocsAccordion">
                        <div class="accordion-body">
                            <h5>POST /chats</h5>
                            <p>Create a chat or add a new message to an existing chat.</p>
                            <h6>Request Body:</h6>
                            <pre><code>{
                "title": "optional|string|max:255",
                "message": "required|string",
                "sender": "required|in:tutor,user",
                "image": "nullable|image|mimes:jpeg,png,jpg|max:20240"
            }</code></pre>
                            <h6>Response:</h6>
                            <pre><code>{
                "success": true,
                "chat": {
                    "id": 1,
                    "title": "Chat Title",
                    "messages": [
                        {
                            "id": 1,
                            "message": "Hello",
                            "sender": "user"
                        },
                        {
                            "id": 2,
                            "message": "Hi there!",
                            "sender": "tutor"
                        }
                    ]
                }
            }</code></pre>
                            <h6>Error Response:</h6>
                            <pre><code>{
                "status": false,
                "message": [
                    "The message field is required.",
                    "The sender must be one of tutor, user."
                ]
            }</code></pre>
                        </div>
                    </div>
                </div>

            </div>

            <div class="accordion" id="apiDocsAccordion">

                <!-- GET /folders -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingGetFolders">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseGetFolders" aria-expanded="false"
                            aria-controls="collapseGetFolders">
                            Folders
                        </button>
                    </h2>
                    <div id="collapseGetFolders" class="accordion-collapse collapse"
                        aria-labelledby="headingGetFolders" data-bs-parent="#apiDocsAccordion">
                        <div class="accordion-body">
                            <h5>GET /folders</h5>
                            <p>Retrieve all folders with associated messages for the authenticated user.</p>
                            <h6>Parameters:</h6>
                            <p>No parameters required.</p>
                            <h6>Response:</h6>
                            <pre><code>{
                "success": true,
                "folders": [
                    {
                        "id": 1,
                        "name": "Important",
                        "messages": [
                            {"id": 10, "content": "Message 1"},
                            {"id": 11, "content": "Message 2"}
                        ]
                    }
                ]
            }</code></pre>
                        </div>
                    </div>
                </div>

                <!-- POST /folders/create -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingPostCreateFolder">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapsePostCreateFolder" aria-expanded="false"
                            aria-controls="collapsePostCreateFolder">
                            Create folders
                        </button>
                    </h2>
                    <div id="collapsePostCreateFolder" class="accordion-collapse collapse"
                        aria-labelledby="headingPostCreateFolder" data-bs-parent="#apiDocsAccordion">
                        <div class="accordion-body">
                            <h5>POST /folders/create</h5>
                            <p>Create a new folder for the authenticated user.</p>
                            <h6>Request Body:</h6>
                            <pre><code>{
                "name": "required|string|max:255"
            }</code></pre>
                            <h6>Response:</h6>
                            <pre><code>{
                "success": true,
                "message": "Folder created successfully.",
                "folder": {"id": 1, "name": "Important"}
            }</code></pre>
                        </div>
                    </div>
                </div>

                <!-- PUT /folders/{folder} -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingPutUpdateFolder">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapsePutUpdateFolder" aria-expanded="false"
                            aria-controls="collapsePutUpdateFolder">
                            Change Name of folder
                        </button>
                    </h2>
                    <div id="collapsePutUpdateFolder" class="accordion-collapse collapse"
                        aria-labelledby="headingPutUpdateFolder" data-bs-parent="#apiDocsAccordion">
                        <div class="accordion-body">
                            <h5>PUT /folders/{folder}</h5>
                            <p>Update the name of an existing folder.</p>
                            <h6>Request Body:</h6>
                            <pre><code>{
                "name": "required|string|max:255"
            }</code></pre>
                            <h6>Response:</h6>
                            <pre><code>{
                "success": true,
                "message": "Folder updated successfully.",
                "folder": {"id": 1, "name": "Updated Name"}
            }</code></pre>
                        </div>
                    </div>
                </div>

                <!-- DELETE /folders/{folder} -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingDeleteFolder">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseDeleteFolder" aria-expanded="false"
                            aria-controls="collapseDeleteFolder">
                            Delete folder
                        </button>
                    </h2>
                    <div id="collapseDeleteFolder" class="accordion-collapse collapse"
                        aria-labelledby="headingDeleteFolder" data-bs-parent="#apiDocsAccordion">
                        <div class="accordion-body">
                            <h5>DELETE /folders/{folder}</h5>
                            <p>Delete an existing folder.</p>
                            <h6>Response:</h6>
                            <pre><code>{
                "success": true,
                "message": "Folder deleted successfully."
            }</code></pre>
                        </div>
                    </div>
                </div>

                <!-- POST /folders/{folder}/messages -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingPostAddMessageToFolder">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapsePostAddMessageToFolder" aria-expanded="false"
                            aria-controls="collapsePostAddMessageToFolder">
                            Add Message to folder
                        </button>
                    </h2>
                    <div id="collapsePostAddMessageToFolder" class="accordion-collapse collapse"
                        aria-labelledby="headingPostAddMessageToFolder" data-bs-parent="#apiDocsAccordion">
                        <div class="accordion-body">
                            <h5>POST /folders/{folder}/messages</h5>
                            <p>Add a message to a folder.</p>
                            <h6>Request Body:</h6>
                            <pre><code>{
                                'sender_id' => 'required|exists:messages,id',
            'response_id' => 'nullable|exists:messages,id',
            }</code></pre>
                            <h6>Response:</h6>
                            <pre><code>{
                                "success": true,
                                "message": "Message added to folder successfully."
                            }
                            </code></pre>
                        </div>
                    </div>
                </div>

                <!-- DELETE /folders/{folder}/messages/{message} -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingDeleteMessageFromFolder">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseDeleteMessageFromFolder" aria-expanded="false"
                            aria-controls="collapseDeleteMessageFromFolder">
                            Remove a message from a folder.
                        </button>
                    </h2>
                    <div id="collapseDeleteMessageFromFolder" class="accordion-collapse collapse"
                        aria-labelledby="headingDeleteMessageFromFolder" data-bs-parent="#apiDocsAccordion">
                        <div class="accordion-body">
                            <h5>DELETE /folders/{folder}/messages/{folderMessage}</h5>
                            <p>Remove a message from a folder.</p>
                            <h6>Response:</h6>
                            <pre><code>{
                "success": true,
                "message": "Message removed from folder successfully."
            }</code></pre>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
