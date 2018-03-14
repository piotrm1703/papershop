<style>
    /*site container style*/
    .pageContainer {
        position: relative;
        max-width: 900px;
        margin: 0 auto;
        height: 100%;
        min-height:100%;
    }
    /*end of site container style*/

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

    /*search  style*/
    .searchButton{
        background-color: darkslategray;
        color: white;
        padding: 3px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .searchbox {
        margin-top: 5px;
        margin-bottom: 5px;
        margin-left: 666px;
    }
    /*end of search style*/

    /*contact form style*/
    .contact_form_field{
        width: 100%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    .contactForm {
        border-radius: 5px;
        background-color: aliceblue;
        padding: 10px;
        margin-left: -215px;
        margin-right: 5px;
        margin-bottom: 5px;
    }
    /*end of contant form style*/

    /*admin new img/delete img style*/
    .addImgForm {
        border-radius: 5px;
        background-color: greenyellow;
        padding: 20px;
        margin: 8px 8px 8px 210px;
    }
    .deleteImgForm {
        border-radius: 5px;
        background-color: coral;
        padding: 20px;
        margin: 8px 8px 8px 210px;
    }
    /*end of admin new img/delete img style*/

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
        background-color: skyblue;
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
        background-color: lightgrey;
        padding: 5px;
        margin: 10px 15px 10px 215px;
        color: black;
        text-align: center;
    }
    /*end of order form and summary*/

    /*top navigation panel style*/
    .topnav {
        overflow: hidden;
        background-color: darkgrey;
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
    .home {
        text-align: center;
        background-color: darkslategray;
        color: white;
    }

    .home:hover {
        background-color: darkred;
        color: white;
    }
    /*end of top navigation panel style*/


    /*admin navigation panel style*/
    .adminnav {
        overflow: hidden;
        background-color: lightgrey;
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
        padding-top: 10px;
    }
    /*end of article style*/

    /*header style*/
    header {
        padding: 3px;
        color: white;
        clear: left;
        text-align: center;
        text-decoration: none;
        background-image: url("/images/background.jpg");
        width: 894px;
        height: 205px;
    }
    header a {
        color: white;
        text-decoration: none;
        position: relative;
        top: 50px;
        font-size: 40px;
    }
    /*end of header style*/

    /*footer style*/
    footer {
        position: relative;
        margin-top: 0;
        height: 18px;
        clear: both;
        text-align: right;
        background-color: lightgrey;
    }
    /*end of footer style*/

    /*login form style*/
    .loginlabel {
        /*margin-left: 170px;*/
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
        background-color: darkslategrey;
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

    /* register form style*/
    .registerButton {
        background-color: darkslategrey;
        color: white;
        border-radius: 4px;
        padding: 3px 10px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 15%;
        float: right;
        margin-right: 170px;
    }
    .registerButton:hover {
        opacity: 0.8;
        background-color:darkred;
    }
    .register_field{
        width: 80%;
        padding: 5px;
        border: 1px solid black;
        border-radius: 5px;
        box-sizing: border-box;
        margin-top: 0;
        margin-bottom: 5px;
        resize: vertical;
    }
    .registerForm {
        border-radius: 5px;
        background-color: aliceblue;
        padding: 10px;
        margin-right: 10px;
        margin-bottom: 10px;
        margin-top: 10px;
    }
    .password_field {
        width: 49%;
        padding: 5px;
        border: 1px solid black;
        border-radius: 5px;
        box-sizing: border-box;
        margin-top: 0;
        margin-bottom: 5px;
        resize: vertical;
    }
    /*end of register form style*/

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
        border: none;
        cursor: pointer;
        width: 30%;
        margin-top: 12px;
    }
    .addToCart:hover {
        opacity: 0.8;
        background-color: darkred;
    }
    .horizontalLine{
        margin-left: 220px;
        margin-right: 20px;
        position: relative;
        bottom: 10px;
    }
    .quantityField {
        width: 65px;
        height: 19px;
        font-size: 13px;
        background-color: aliceblue;
    }
    /*end of product view style*/

    /*shopping cart style*/
    .deleteFromCart {
        background: none;
        padding: 0;
        border: none;
        color: firebrick;
        position: relative;
        left: 640px;
        bottom: 100px;
        font-size: 17px;
    }
    .deleteFromCart:hover {
        background: none;
        opacity: 0.8;
        color: darkslategrey;
    }
    .addOne {
        color: darkslategrey;
        background: none;
        padding: 0;
        border: none;
        cursor: pointer;
        position: relative;
        bottom: 60px;
        left: 110px;
        font-size: 18px;
    }
    .addOne:hover {
        opacity: 0.8;
        color:darkred;
    }
    .minusOne {
        color: darkslategrey;
        background: none;
        padding: 0;
        border: none;
        cursor: pointer;
        position: relative;
        bottom: 60px;
        left: 115px;
        font-size: 18px;
    }
    }
    .minusOne:hover {
        opacity: 0.8;
        color:darkred;
    }
    .summaryButton {
        background-color: darkslategrey;
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
        background-color: darkgrey;
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
    .li-sidemenu:first-child{
        border-top: 1px solid black;
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
        color: darkslategrey;
    }
    .admin table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        margin-bottom: 10px;
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

    /*edit products icon style*/
    .editButton {
        background: none;
        border: none;
        color: firebrick;
        font-size: 30px;
        position: relative;
        left: 510px;
        bottom: 20px;
    }
    .editButton:hover {
        background: none;
        opacity: 0.8;
        color: darkslategrey;
    }
    .editItemForm {
        border-radius: 5px;
        background-color: gainsboro;
        padding: 20px;
        margin: 8px 8px 8px 210px;
    }
    .deleteItemButton{
        background-color: red;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .deleteItemButton:hover {
        opacity: 0.8;
        background-color: darkred;
    }

    /*end of edit products icon style*/

    /*reply msg form style*/
    .replyMsgArea {
        width: 100%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
        height: 150px;
    }
    .replyMsgForm {
        border-radius: 5px;
        background-color: aliceblue;
        padding: 10px;
        margin: 15px 10px 10px 215px;
    }
    /*end of reply msg form style*/

    /*cartButton*/
    .fa-shopping-cart {
        font-size: 20px;
    }
</style>
