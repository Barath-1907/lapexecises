<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>employee register</title>

</head>
<style>
 * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    background: #f2f5f9;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 15px;
}

.container {
    width: 500px;
    background: white;
    padding: 30px;
    border-radius: 12px;
   
}

.header {
    text-align: center;
    margin-bottom: 25px;
}



button {
    width: 50%;
    padding: 13px;
    background: #1e3a5f;
    color: white;
    border: none;
    border-radius: 7px;
    font-size: 16px;
    margin: 10px;
    cursor: pointer;
    margin-left:100px;
}

.header h1 {
    color: #1e3a5f;
    margin-bottom: 8px;
}

.header p {
    color: #777;
}

.form-group {
    margin-bottom: 18px;
}

.form-group label {
    display:inline-block;
    margin-bottom: 10px;
    color: #333;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 7px;
    font-size: 15px;
}


button:hover {
    background: #142942;
}

</style>
</head>
<body>
    <form  action="db.php" method="POST" onsubmit="return validation()">

    <div class="container">

    <div class="header">
    <h1>Employee Registration</h1>
    <p>Enter employee details</p>
    </div>

    <div class="form-group">
                <label>Student Name</label>
                <input type="text" id="name" name="name"
                       placeholder="Enter name">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email" name="email" placeholder="Enter email address">
            </div>

            <div class="form-group">
            <label>Phone Number</label>
            <input type="text" id="phone" name="phone" placeholder="Enter phone number">
            </div>
            <div class="form-group">
            <label>Gender</label>
               <input type="radio" value="male">
               <spam>male<spam>
                <input type="radio" value="female">
               <spam>female<spam>
            </spam>
           </div>
            <div class="form-group">
                <label>Department</label>

                <select id="department" name="department">
                  <option value="">Select Department</option>
                  <option value="Computer Science">Computer Science</option>
                  <option value="Information Technology">Information Technology</option>
                  <option value="Electronics">Electronics</option>
                  <option value="Mechanical">Mechanical</option>
                  <option value="Civil">Civil</option>
                </select>
                
            </div>
            <button type="submit">Save </button>
             </div>

        </form>


    <script>
        <script src="script.js"></script>
    </script>
</body>
 

</html>