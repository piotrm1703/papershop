<style>

    /* main button style*/
    .universalButton {
        background-color: darkslategray;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .universalButton:hover {
        opacity: 0.8;
        background-color: darkred;
    }
    /*end of main button style*/


    /*contact form style*/
    .contactformFields{
        width: 100%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    .contactform {
        border-radius: 5px;
        background-color: aliceblue;
        padding: 10px;
        margin: 10px;
    }
    /*end of contant form style*/

    /*admin new img style*/
    .newfile {
        border-radius: 5px;
        background-color: lightgreen;
        padding: 20px;
        margin: 8px 8px 8px 210px;
    }
    /*end of admin new img style*/

    /*admin delete item style*/
    .selectDelete {
        width: 100%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    .buttonAdminDelete {
        background-color: red;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .buttonAdminDelete:hover {
        opacity: 0.8;
        background-color:darkred;
    }
    .adminDeleteItemForm {
        border-radius: 5px;
        background-color: lightcoral;
        padding: 20px;
        margin: 8px 8px 8px 210px;
    }
    /*end of admin delete style*/

    /*admin new item*/
    .newItemFieldsAdmin {
        width: 100%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    .newItem {
        border-radius: 5px;
        background-color: lightskyblue;
        padding: 20px;
        margin: 8px 8px 8px 210px;
    }
    /*end of admin new item style*/

    /*order form and summary*/
    .orderFormFields {
        width: 50%;
        padding: 3px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    .summary {
        border-radius: 50px;
        background-color: aliceblue;
        padding: 20px;
        margin: -5px 15px 5px -5px;
    }
    .products {
        border-radius: 30px;
        background-color: aliceblue;
        padding: 5px;
        margin: 7px 15px -5px 215px;
    }
    .sum {
        border: 1px solid;
        border-radius: 30px;
        background-color: orange;
        padding: 5px;
        margin: 10px 15px 10px 215px;
        color: black;
        text-align: center;
    }
    /*end of order form and summary*/

    /*top navigation panel style*/
    .topnav {
        overflow: hidden;
        background-color: cadetblue;
        border: 1px solid black;
        border-left: none;
        border-right: none;
    }
    .topnav a {
        float: left;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 30px;
    }
    .topnav a:hover {
        background-color: darkslategray;
        color: white;
        opacity: 0.8;
    }
    /*end of top navigation panel style*/


    /*admin navigation panel style*/
    .adminnav {
        width: 100%;
        overflow: hidden;
        background-color: lightblue;
        border-bottom: 1px solid black;
    }
    .adminnav a {
        float: right;
        color: black;
        text-align: center;
        padding: 3px 6px;
        text-decoration: none;
        font-size: 15px;
    }
    .adminnav a:hover {
        background-color: white;
        color: black;
    }
    /*end of admin navigation panel style*/

    /*article style*/
    article {
        margin-left: 220px;
    }
    article.content {
        padding-top: 20px;
    }
    /*end of article style*/

    /*site container style*/
    .pageContainer {
        max-width: 900px;
        margin: 0 auto;
        border: 1px solid black;
    }
    /*end of site container style*/

    /*header style*/
    header {
        padding: 3px;
        color: white;
        clear: left;
        text-align: center;
        text-decoration: none;
        background-image: url("/images/tło.jpg");
        width: 850px;
        height: 205px;
        margin: 20px;
    }
    header a {
        color: black;
        text-decoration: none;
    }
    /*end of header style*/

    /*footer style*/
    footer {
        padding: 1em;
        color: white;
        background-color: cadetblue;
        clear: left;
        text-align: inherit;
        border-top: 1px solid black;
    }
    /*end of footer style*/

    /*login form style*/

    .logincontainer {
        width: 100%;
        border-top: 1px solid black;
        background-color: cadetblue;
    }

    .loginNamePasswordStyle {
        width: 20%;
        padding: 3px 20px;
        margin: 2px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .loginOutButton {
        background-color: darkcyan;
        color: white;
        border-radius: 4px;
        padding: 3px 10px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 15%;
    }
    .loginOutButton:hover {
        opacity: 0.8;
        background-color: darkred;
    }
    /*end of login form style*/

    /*link style*/
    .offer a {
        color: darkcyan;
    }
    .offer a:link {
        text-decoration: none;
        color: ;
    }
    .offer a:hover {
        color: darkred;
    }
    /*end of link style*/

    /*product view style*/
    .price {
        text-align: left;
    }
    .imgView {
        float:left;
        width: 119px;
        height:60px;"
    }
    .productcontainer {
        margin-left: 220px;
        position: relative;
        bottom: 35px;
    }
    .addToCart {
        background-color: darkslategray;
        color: white;
        border-radius: 4px;
        padding: 5px;
        margin: 12px 0;
        border: none;
        cursor: pointer;
        width: 30%;
    }
    .addToCart:hover {
        opacity: 0.8;
        background-color: darkred;
    }
    .horizontalLine{
        margin-left: 220px;
        position: relative;
        bottom: 10px;
    }
    /*end of product view style*/

    /*shopping cart style*/
    .deleteFromCart {
        background-color: red;
        color: white;
        border: none;
        border-radius: 15px;
        cursor: pointer;
    }
    .deleteFromCart:hover {
        opacity: 0.8;
        background-color:darkred;
    }
    .summaryButton {
        background-color: darkcyan;
        color: white;
        padding: 5px 20px;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        width: 68%;
        position: relative;
        bottom: 5px;
        font-size: 20px;
    }
    .summaryButton:hover {
        background-color: darkred;
        opacity: 0.8;
    }
    .deleteAll {
        background-color: red;
        color: white;
        border: none;
        padding: 5px;
        border-radius: 30px;
        cursor: pointer;
        width: 30%;
        position: relative;
        bottom: 38px;
        right: 10px;
        float: right;
        font-size: 20px;
    }
    .deleteAll:hover {
        opacity: 0.8;
        background-color:darkred;
    }
    .shoppingCart {
        border-radius: 5px;
        background-color: aliceblue;
        padding: 5px;
        margin: -5px 10px 10px 220px;
    }
    /*end of shopping cart style*/

    /*side menu style*/
    .ul-sidemenu {
        list-style-type: none;
        padding: 0;
        width: 200px;
        background-color: cadetblue;
        border-right: 1px solid black;
        float: left;
        margin-right: 20px;
        margin-top: 0;
        margin-bottom: 10px;
    }
    .li-sidemenu {
        text-align: center;
        border-bottom: 1px solid black;
    }
    .li-sidemenu a {
        display: block;
        color: white;
        padding: 8px 8px;
        text-decoration: none;
    }
    .li-sidemenu a:hover:not(.active) {
        background-color: darkslategray;
        color: white;
        opacity: 0.8;
    }
    .li-sidemenu:last-child {
        border-bottom: 1px solid black;
    }
    .li-shoppingCart {
        text-align: center;
        border-bottom: 1px solid black;
        background-color: darkslategray;
        color: white;
    }
    .li-shoppingCart a {
        display: block;
        color: white;
        padding: 8px 8px;
        text-decoration: none;
    }
    .li-shoppingCart a:hover {
        background-color: darkred;
        color: white;
    }
    .li-shoppingCart:last-child {
        border-bottom: 1px solid black;
    }
    /*end of side menu style*/

    /*admin tables style*/
    .fabutton {
        background: none;
        padding: 0;
        border: none;
        color: firebrick;
    }
    .fabutton:hover {
        background: none;
        opacity: 0.8;
        color: orange;
    }
    .admin table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    .admin th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: aliceblue;
        color: black;
        font-size: 16px;
    }
    .admin tr {
        font-size: 13px;
        text-align: center;
    }
    .admin tr:nth-child(even){background-color: #f2f2f2;}

    .admin tr:hover {background-color: #ddd;}

    .admin th a {
        color: blue;
        text-decoration: none;
    }
    /*end of admin tables style*/
</style>