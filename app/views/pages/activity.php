<div class="page">
    <div class="users"></div>
    <script id="user-template" type="text/x-handlebars-template">
        <div class="user">
      <div class="photo"><img src="{{photo}}"/></div>
      <div class="info">
        <div class="name">{{name}}</div>
        <div class="nickName">{{userName}}</div>
      </div>
      <dl>
        <dt>Born</dt>
        <dd>{{born}}</dd>
        <dt>DOB</dt>
        <dd>{{dob}}</dd>
        <dt>E-mail</dt>
        <dd>{{email}}</dd>
      </dl>
      <div class="funcs">
        <div class="left">
          <div class="icon status fa fa-edit" title="Status"></div>
          <div class="icon delete fa fa-trash" title="Delete"></div>
        </div>
        <div class="right">
          <div class="icon clone fa fa-copy" title="Clone"></div>
          <div class="icon send fa fa-envelope" title="Send message"></div>
        </div>
      </div>
    </div>
  </script>
    <script id="new-user-template" type="text/x-handlebars-template">
        <div class="user new">
      <div class="photo">
        <div class="placeHolder"></div>
      </div>
      <div class="info">
        <div class="name">Add new user</div>
      </div>
    </div>
  </script>
    <div class="editorBox">
        <div class="propertyEditor"></div>
    </div>
</div>
<div class="popup">
    <div class="header">
        <div class="title">Send a message</div>
        <div class="icon"><i class="fa fa-send" title="Send"></i></div>
    </div>
    <div class="content">
        <textarea placeholder="Your message"></textarea>
    </div>
</div>
<div class="instructions">
    <ol type="1">
        <li>Select a user</li>
        <li>Try to change Name or Nickname property</li>
        <li>Press "Send message to user" button and watch the nice popup window</li>
        <li>Select an other user too</li>
        <li>Try the multiple property edit (e.g. change status)</li>
        <li>Watch the "Add new user" button hover effect</li>
    </ol>
</div>