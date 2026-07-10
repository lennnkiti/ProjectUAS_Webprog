<!DOCTYPE html>
<html>
<head>
    <title>Project UAS Web Prog</title>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <style>
        body{
            margin: 20px;
            font-family: 'Times New Roman';
        }

        .identitas{
            margin: 10px;
        }

        .container{
            display: flex;
            margin-bottom: 20px;
        }

        p{
            margin: 0px;
            display: inline;
        }

        div.form-group{
            border: 2px solid black;
            padding: 10px;
            padding-bottom: 20px;
            margin-right: 20px;
            width: 300px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        td{
            border: 1px solid black;
            height: 40px;
        }

        .unavailable{
            background-color: gray;
        }
    </style>
</head>
<body>

    <div class="identitas">
        Creator: <br>
        1. Valentino Fittivaldi Santoso (160424011) <br>
        2. Christopher Albert (160424028) <br>
        3. Jonathan Salem (160424093) 
    </div>

    <div class="container">

        <div class="form-group">
            <h4>Inisialisasi</h4>

            <p>Jumlah Baris :</p>
            <input type="number" id="row" min="1"><br><br>

            <p>Jumlah Kolom :</p>
            <input type="number" id="col" min="1"><br><br>

            <button id="btnCreate">Create</button>
        </div>

        <div class="form-group">
            <h4>Okupansi</h4>

            <p>Baris :</p>
            <input type="number" id="targetRow"><br><br>

            <p>Kolom :</p>
            <input type="number" id="targetCol"><br><br>

            <p>Status :</p>
            <select id="status">
                <option value="available">Available</option>
                <option value="unavailable">Unavailable</option>
            </select>
            <br><br>

            <button id="btnSimpan">Simpan</button>
        </div>

    </div>

    <div id="buatTable"></div>

    <script>

        $("#btnCreate").click(function(){

            let rows = parseInt($("#row").val());
            let cols = parseInt($("#col").val());
           
            if(isNaN(rows) || isNaN(cols) || rows <= 0 || cols <= 0){
                alert("Masukkan jumlah baris dan kolom berupa angka");
                return;
            }

            let table = "<table id='parkingTable'>";

            for(let i=1;i<=rows;i++){

                table += "<tr>";

                for(let j=1;j<=cols;j++){

                    table += "<td id='cell-" + i + "-" + j + "'></td>";

                }

                table += "</tr>";
            }

            table += "</table>";

            $("#buatTable").html(table);

        });
    
        $("#btnSimpan").click(function(){

            let row = parseInt($("#targetRow").val());
            let col = parseInt($("#targetCol").val());
            let status = $("#status").val();

            let targetCell = $("#cell-" + row + "-" + col);

            if(targetCell.length == 0){
                alert("Baris/Kolom tidak ditemukan");
                return;
            }

            if(status == "unavailable"){
                targetCell.addClass("unavailable");
            }
            else{
                targetCell.removeClass("unavailable");
            }

        });


    </script>

</body>
</html>