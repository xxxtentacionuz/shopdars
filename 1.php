
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<style>
    .loginbox{
        display: flex;
        align-items: center;
        justify-content:space-between;
        margin-bottom: 5px;
    }
    .loginbox:last-child{
        display: block;
    }
    button{
        margin: 20px 0 0 5px;
    }
    i{
        /* qizil */
        color: red;
    }
    i:last-child{
        position: absolute;
    }
</style>
<body>
<fieldset style="width: 55%;">
    <legend>Belgilar</legend>
    <div class="loginbox">
        <label for="name">Name <i>*</i></label>
        <input type="text" id="name">
    </div>
    <div class="loginbox">
        <label for="name">Email <i>*</i></label>
        <input  type="text" id="name">
    </div>
    <div class="loginbox">
        <label for="name">Investment</label>
        <input  type="number" id="name">
    </div>
    <div class="loginbox">
        <label for="name">Date Joined<i>*</i></label>
        <input type="datetime-local" id="name">
    </div>
    <div class="loginbox">
        <label for="name">Active</label>
        <input type="checkbox" id="name">
    </div>
</fieldset>
<div class="buttons">
    <button>Ok</button><button>Cancel</button>
</div>
</body>
</html>