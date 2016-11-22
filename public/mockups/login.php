<!DOCTYPE html>
<html>
<head>
	<title>Badminton Event Platform</title>
	<link rel="stylesheet" href="../assets/semantic.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
	<style type="text/css">
		.parent {
  -webkit-transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  transform-style: preserve-3d;
}
.child {
  position: relative;
  top: 50%;
  transform: translateY(-50%);
}
	</style>
	<div class="ui middle aligned grid child">
    <div class="column">
        <div class="ui center aligned page grid">
            <div class="eight wide  column">
                <div class="ui left aligned segment">
                     <h4 class="ui dividing header">Login</h4>

                    <div class="ui form">
                        <div class="field">
                            <label for="username">Username:</label>
                            <div class="ui icon input">
                                <input type="text" placeholder="Username" name="username" id="username" /> <i class="user icon"></i>

                            </div>
                        </div>
                        <div class="field">
                            <label for="password">Password:</label>
                            <div class="ui icon input">
                                <input type="password" placeholder="Password" name="password" id="password" /> <i class="lock icon"></i>

                            </div>
                        </div>
                        <input type="submit" name="submit" class="ui blue button" />
                    </div>

                </div>
                <div class="ui message">
      New to us? <a href="#">Sign Up</a>
    </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>