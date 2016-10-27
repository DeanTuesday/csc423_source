<?php
    echo "
    <!doctype html>
    <html>
        <head>
            <meta charset='utf-8'>
            <title>Nanno's Foods</title>
            <link rel='stylesheet' type='text/css' href='./css/styles.css' />
        </head>

        <body>
            <div>
                <h3>Item Page!</h3>
                <hr/>
                <p>Please Select What You Would Like To Do!</p>

                <table>
                    <tr>
                        <td><button name='additem' id='additem' onclick='window.location.href='./addItem.php''>Add Item</button></td>
                        <td><button name='moditem' id='moditem' onclick='window.location.href='./UpdateItem.php''>Modify Item</button></td>
                        <td><button name='delitem' id='delitem' onclick='window.location.href='./DeleteItem.php''>Delete Item</button></td>
                    </tr>
                     <tr>
                        <td colspan='3'><button name='main' id='main' onclick='window.location.href='./index.html''>Main Page</button></td>
                    </tr>
                </table>
            </div>
        </body>
    </html>
    ";
?>
