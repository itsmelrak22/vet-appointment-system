<html>
<h1> Add services </h1>
 <form method="POST">
            <label for="">Service name </label>
            <input type="text" name="service_name" required>
        </div>
        <div> 
            <label for="">Category</label>  
            <select name="category" id="" required> 
                <option value="Selected"> Select Services </option>
                <option value="Dog"> Dog </option>
                <option value="Cat"> Cat </option>
                <option value="Snake"> Snake </option>
                <option value="Hamster"> Hamster </option>
            </select>
        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="description" required>
        </div>
         <div>
            <label for="">Fee</label>
            <input type="number" name="fee" required>
        </div>
        <div>
        <button onclick="openPopup()" name="add_services"> Save </button>
        </div>
</html>