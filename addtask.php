<?php

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Task </title>

        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            /* background: linear-gradient(135deg, #71b7e6, #9b59b6); */
            background: radial-gradient(circle, rgba(119, 255, 157, 1) 0%, rgba(148, 233, 209, 1) 100%);
        }

        .container {
            max-width: 700px;
            width: 100%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        }

        .container .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
        }

        .container .title::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            border-radius: 5px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .content form .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }

        form .input-box span.details {
            display: flex;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .user-details .input-box input {
            height: 35px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user-details .input-box input:focus,
        .user-details .input-box input:valid {
            border-color: #9b59b6;
        }

        form .category {
            display: flex;
            width: 80%;
            margin: 14px 0;
            justify-content: space-between;
        }

        form .category label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        form .category label .dot {
            height: 18px;
            width: 18px;
            border-radius: 50%;
            margin-right: 10px;
            background: #d9d9d9;
            border: 5px solid transparent;
            transition: all 0.3s ease;
        }

        #dot-1:checked~.category label .one,
        #dot-2:checked~.category label .two,
        #dot-3:checked~.category label .three {
            background: #9b59b6;
            border-color: #d9d9d9;
        }

        form input[type="radio"] {
            display: none;
        }

        form .button {
            height: 45px;
            margin: 35px 0
        }

        form .button input {
            height: 100%;
            width: 100%;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: green;
            margin-top: 2.5rem;
        }

        /* form .button input:hover {
    transform: scale(0.99);
    background: linear-gradient(-135deg, #71b7e6, #9b59b6);
} */

        @media(max-width: 584px) {
            .container {
                max-width: 100%;
            }

            form .user-details .input-box {
                margin-bottom: 15px;
                width: 100%;
            }

            form .category {
                width: 100%;
            }

            .content form .user-details {
                max-height: 300px;
                overflow-y: scroll;
            }

            .user-details::-webkit-scrollbar {
                width: 5px;
            }
        }

        @media(max-width: 459px) {
            .container .content .category {
                flex-direction: column;
            }
        }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="title">
                <h3 style="font-size: 20px;margin-bottom: 15px;">Task Details</h3>
            </div>
            <div class="content">
                <form method="POST" action="insert_task.php">
                    <div class="user-details ">
                        <div class="input-box">
                            <span class="details ">Task Name</span>

                            <input type="text" name="taskname" placeholder="Enter task name " required>
                        </div>
                        <div class="input-box">
                            <span class="details">Task Date</span>
                            <input type="date" name="date" placeholder="Enter task date " required>
                        </div>
                        <div class="input-box">
                            <span class="details ">Start Time</span>
                            <input type="text" name="start_time" placeholder=" Enter start time" required>
                        </div>
                        <div class="input-box ">
                            <span class="details ">Address</span>
                            <input type="text" name="address" placeholder="Enter the venue address" required>
                        </div>
                        <div class="input-box ">
                            <span class="details ">District</span>
                            <select name="district">
                                <option value="Baling">Baling</option>
                                <option value="Bandar Baharu">Bandar Baharu</option>
                                <option value="Kota Setar">Kota Setar</option>
                                <option value="Kuala Muda">Kuala Muda</option>
                                <option value="Kubang Pasu">Kubang Pasu</option>
                                <option value="Kulim">Kulim</option>
                                <option value="Langkawi">Langkawi</option>
                                <option value="Padang Terap">Padang Terap</option>
                                <option value="Pendang">Pendang</option>
                                <option value="Pokok Sena">Pokok Sena</option>
                                <option value="Sik">Sik</option>
                                <option value="Yan">Yan</option>
                            </select>

                        </div>
                        <div class="input-box">
                            <span class="details">Description</span>
                            <input type="text" name="description" placeholder="Enter task's description" required>
                        </div>


                    </div>
                    <div class="button">
                        <input type="submit" name="add_task" value="SUBMIT">
                    </div>
                </form>
            </div>

        </div>

    </body>

</html>