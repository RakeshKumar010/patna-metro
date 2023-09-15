<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
        letter-spacing: 1px;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    .signup_login_main {
        margin: 0;
        font-family: Roboto, -apple-system, 'Helvetica Neue', 'Segoe UI', Arial, sans-serif;
        /* background: #3b4465; */
        height: 100vh;
        /* padding-top: 6vh; */
        display: flex;
        /* align-items: center; */
        justify-content: space-evenly;
        position: relative;
    }

    .page_container_main {
        display: flex;
        justify-content: space-between;
    }


    .section-title {
        font-size: 32px;
        letter-spacing: 1px;
        color: #fff;
    }

    .forms {
        display: flex;
        align-items: flex-start;
    }

    .form-wrapper {
        animation: hideLayer .3s ease-out forwards;

        width: 22vw;
    }

    .form-wrapper.is-active {
        animation: showLayer .3s ease-in forwards;
    }
    .add_remove_btn{
        display: flex;
        justify-content: end;
        margin: 1vw 0;
        gap: 10px;
    }

    .add_more_btn {
        /* text-align: ; */
        /* width: 3%; */
        /* position: absolute;
        left: -1vw;
        bottom: -1vh; */
        background-color: #fff;
        box-shadow: 0 0 1px black;
        border-radius: 30px;
    }

    #delete_input_faild {
        border: 0;
        padding: 0 0 0 10px;
    }

    /* width: 50%; */
    @keyframes showLayer {
        50% {
            z-index: 1;
        }

        100% {
            z-index: 1;
        }
    }

    @keyframes hideLayer {
        0% {
            z-index: 1;
        }

        49.999% {
            z-index: 1;
        }
    }

    .switcher {
        position: relative;
        cursor: pointer;
        display: block;
        margin-right: auto;
        margin-left: auto;
        padding: 0;
        text-transform: uppercase;
        font-family: inherit;
        font-size: 16px;
        letter-spacing: .5px;
        color: #999;
        background-color: transparent;
        border: none;
        outline: none;
        transform: translateX(0);
        transition: all .3s ease-out;


    }


    .form-wrapper.is-active .switcher-login {
        /* color: #fff; */
        color: black;
        font-weight: bolder;

        transform: translateX(90px);
    }

    .form-wrapper.is-active .switcher-signup {
        color: black;
        font-weight: bolder;
        transform: translateX(-90px);
    }

    .underline {
        position: absolute;
        bottom: -5px;
        left: 0;
        overflow: hidden;
        pointer-events: none;
        width: 100%;
        height: 2px;
    }

    .underline::before {
        content: '';
        position: absolute;
        top: 0;
        left: inherit;
        display: block;
        width: inherit;
        height: inherit;
        background-color: currentColor;
        transition: transform .2s ease-out;
    }

    .switcher-login .underline::before {
        transform: translateX(101%);
    }

    .switcher-signup .underline::before {
        transform: translateX(-101%);
    }

    .form-wrapper.is-active .underline::before {
        transform: translateX(0);
    }

    .form {
        overflow: hidden;
        min-width: 260px;
        margin-top: 50px;
        padding: 1vw;
        border-radius: 5px;
        transform-origin: top;
        border: 1px solid;
    }

    .form-login {
        animation: hideLogin .3s ease-out forwards;
    }

    .form-wrapper.is-active .form-login {
        animation: showLogin .3s ease-in forwards;
    }

    @keyframes showLogin {
        0% {
            background: #d7e7f1;
            transform: translate(40%, 10px);
        }

        50% {
            transform: translate(0, 0);
        }

        100% {
            background-color: #fff;
            transform: translate(35%, -20px);
        }
    }

    @keyframes hideLogin {
        0% {
            background-color: #fff;
            transform: translate(35%, -20px);
        }

        50% {
            transform: translate(0, 0);
        }

        100% {
            background: #d7e7f1;
            transform: translate(40%, 10px);
        }
    }

    .form-signup {
        animation: hideSignup .3s ease-out forwards;
    }

    .form-wrapper.is-active .form-signup {

        animation: showSignup .3s ease-in forwards;
        /* position: static; */
    }

    @keyframes showSignup {
        0% {
            background: #d7e7f1;
            transform: translate(-40%, 10px) scaleY(.8);
        }

        50% {
            transform: translate(0, 0) scaleY(.8);
        }

        100% {
            background-color: #fff;
            transform: translate(-35%, -20px) scaleY(1);
        }
    }

    @keyframes hideSignup {
        0% {
            background-color: #fff;
            transform: translate(-35%, -20px) scaleY(1);
        }

        50% {
            transform: translate(0, 0) scaleY(.8);
        }

        100% {
            background: #d7e7f1;
            transform: translate(-40%, 10px) scaleY(.8);
        }
    }

    .form fieldset {
        position: relative;
        opacity: 0;
        margin: 0;
        padding: 0;
        border: 0;
        transition: all .3s ease-out;
    }

    .form-login fieldset {
        transform: translateX(-50%);
    }

    .form-signup fieldset {
        transform: translateX(50%);
    }

    .form-wrapper.is-active fieldset {
        opacity: 1;
        transform: translateX(0);
        transition: opacity .4s ease-in, transform .35s ease-in;
    }

    .form legend {
        position: absolute;
        overflow: hidden;
        width: 1px;
        height: 1px;
        clip: rect(0 0 0 0);
    }

    .input-block {
        margin-bottom: 10px;
    }

    .input-block label {
        font-size: 14px;
        color: black;
        font-weight: 600;
    }

    .input-block input {
        display: block;
        width: 100%;
        margin-top: 8px;
        padding: 0.5vw 0.7vw;

        font-size: 16px;
        /* line-height: 40px; */
        color: #3b4465;
        background: #eef9fe;
        border: 1px solid #cddbef;
        border-radius: 2px;
    }

    .form [type='submit'] {
        opacity: 0;
        display: block;
        min-width: 120px;
        margin: 10px auto 10px;
        font-size: 18px;
        line-height: 40px;
        border-radius: 25px;
        border: none;
        transition: all .3s ease-out;
    }

    .form-wrapper.is-active .form [type='submit'] {
        opacity: 1;
        transform: translateX(0);
        transition: all .4s ease-in;

        background: orange;
        color: black;
        text-shadow: 0 0 0px;
    }

    .btn-login {
        color: #fbfdff;
        background: #a7e245;
        transform: translateX(-30%);
    }

    .btn-signup {
        color: #a7e245;
        background: #fbfdff;
        /* box-shadow:  0 0 18px orange; */
        transform: translateX(30%);
    }

    .error_show {
        text-align: center;
        color: red;
    }

    /* headre style */
    .header_main {
        display: flex;
        width: 100%;
        gap: 2vw;
        /* justify-content: space-between; */
        align-items: center;
        background: white;
        min-height: 6vw;
        border-bottom: 1px solid;
        padding: 0 1vw;
    }

    .gov_img {
        width:94px;

    }

    .heading_main {
        display: flex;
        flex-direction: column;
      
    }

    .heading {
        color: #2f5ed4;
        
    }

    .logo {
        width: 5%;
    }

    .sidebar_container {
        display: flex;
        gap: 1vw;
        align-items: center;
        padding: 0 10px;
        padding-right: 0;
    }

    /* sidebar  */
    .sidebar_main {

        display: flex;
        flex-direction: column;

        text-decoration: none;
        gap: 1vw;
        list-style-type: none;
        float: left;
        /* margin-top: 1vw; */
        padding-top: 15px;

        padding-right: 10px;
        font-weight: 500;

        border-right: 1px solid black;
    }

    .sidebar_main li {
        padding: 0.5vw 1vw;
        border-radius: 10px;
        width: 11vw;

        /* border: 0.5px solid; */

    }

    .sidebar_main a {
        width: 100%;
        color: black;
        text-decoration: none;
        font-weight: 600;

    }

    .sidebar_main li:hover {
        background-color: #2f5ed4;
        color: white;

    }

    .Usrdash_main {
        width: 80vw;
        /* margin-top: 1vw; */
        float: right;
        margin-right: 1vw;
        height: 80vh;
        display: flex;
        /* align-items: center; */
        justify-content: center;
        position: relative;

    }

    .application_btn {
        text-decoration: none;
        color: white;
        display: block;
        border-radius: 20px;
        padding: 0.5vw 3vw;
        background-color: #2f5ed4;
        width: fit-content;

    }

    .application_btn:hover {
        /* background-color: #a7e245; */
        scale: 1.1;
        box-shadow: 0px 5px 12px gray;
    }

    .user_registeration_form {
        width: 80vw;
        margin-top: 1vw;
        float: right;
        margin-right: 2vw;
    }

    .user_registeration_form input {
        width: 100%;
        border: 0.5px solid;
        height: 2vw;
    }

    .form_usr_main {
        padding: 2vw 5vw;
    }

    .user_registeration_heading {
        text-align: center;
        margin-bottom: 3vw;
    }

    .user_registeration_2nd_heading {
        text-decoration: underline;
        margin: 2vw 0;
        font-weight: bold;
        text-shadow: 0 0;
    }



    .user_registeration_input_container {
        display: flex;
        justify-content: space-between;
        margin: 0.4vw 0;
    }

    .input_label_container {
        text-align: center;
        width: 20vw;
    }

    .input_label_container label {
        font-size: 12px;
        width: fit-content;

        font-weight: 600;
    }

    .input_label_container input {
        padding: 5px;
        border-radius: 6px;
    }

    .input_label_container select {
        height: 2vw;
        border-radius: 6px;
        border: 1px solid;
        width: 20vw;
    }

    .user_application_table {
        width: 100%;
        /* border: 1px solid; */
        border-collapse: collapse;
        /* height: 15vw; */
    }

    .experience_table {
        position: relative;

    }

    .user_application_table th {
        font-weight: bolder;
        font-size: 12px;
        border: 1px solid black;
        text-align: center;
        background-color: #2f70b5;
        color: white;


        padding: 0.3vw 0;

    }

    .user_application_table td {
        border: 1px solid;
        text-align: center;

    }

    .user_application_table tr input {
        /* border-radius: 6px; */
        border: 0;
        text-align: center;

    }

    .user_registeration_heading3 {
        margin-bottom: 3vw;
        text-decoration: underline;
    }

    .usrapplication_save_btn_div {
        margin: 3vw;
        /* text-align: center; */
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1vw;

    }

    .usrapplication_save_btn {
        padding: 0.5vw 1vw;
        background-color: #007bff;
        color: white;
        border-radius: 10px;
        border: 0;
        font-size: 18px;
        margin: 0;
        width: fit-content;
        /* transition: all; */
    }

    .preview_btn {
        padding: 0.5vw 1vw;
        background-color: #81a381;
        color: #6f6b6b;
        border-radius: 10px;
        border: 0;
        font-size: 18px;
        margin: 0;
        width: fit-content;
    }

    .usrapplication_save_btn:hover {
        /* scale: 1.1; */
        cursor: pointer;
        box-shadow: 0 0 8px gray;
    }

    .address_check_box_para {
        padding: 0;
        margin: 0;
    }


    /* footer  */

    .copyright_main {
        position: fixed;
        width: 100%;
        bottom: 0;
        background: gray;
        box-shadow: 1px 1px 8px #000 inset;
        text-align: center;
        display: flex;
        justify-content: space-between;
        padding: 0.5vw 10vw;
        z-index: 1;
    }

    .copyright_links {
        display: flex;
        gap: 2vw;
    }

    .copyright_main p,
    .copyright_main a {
        margin: 0;
        font-size: 14px;
        color: #fff;
    }

    /* index text  */
    .index_text_main {
        width: 40vw;
        text-align: center;
        /* color: white; */
    }


    .box1_container {
        /* border: 1px solid; */
        width: 33vw;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .box_main {
        width: 100%;
        display: flex;
        justify-content: space-between;
        gap: 5px;
        align-items: center;
    }

    .box1 {
        width: 100%;
        height: 12vh;
    }

    .box1 textarea {
        width: 100%;
        height: 100%;
        /* border: 0; */
        border-radius: 10px;


    }

    .footer_adress {
        display: flex;
        justify-content: space-between;
        /* height: fit-content; */
        padding: 0.2vw;
    }

    .footer_box {
        display: flex;
        justify-content: space-between;
        height: fit-content;
        border: 0;
        width: 33vw;
        height: 7vh;
        border-radius: 10px;

    }

    .address_input_container input,
    .address_input_container select {
        width: 10vw;
    }

    .box1_para {
        font-weight: 600;
        font-size: 14px;

    }

    .declaration_container {
        display: flex;
        gap: 7px;
        align-items: flex-start;
        margin-top: 8px;

    }

    .address_check_box_div {
        display: flex;
        gap: 7px;
        align-items: flex-start;
        /* margin-top: 8px; */
        align-items: center;
        margin-bottom: 2vw;
    }

    .declaration_main {
        margin: 2vw 0;

    }

    .declaration_main label {
        font-weight: 600;
        /* margin: 5px; */
    }

    .declaration_container p {
        font-size: 13px;
    }

    #declaration_id {
        width: unset;
        height: unset;
        margin: unset;
    }

    #address_check_box {
        width: unset;
        height: unset;
        margin: unset;
    }

    .index_text_heading {
        padding: 0.7vw;
        border-radius: 17px;
        box-shadow: 3px 3px 8px black;
        margin-bottom:3vw;
        font-size: x-large;
    }


    /* upload document  */

    .document_upload_div {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .document_upload_div label {
        width: fit-content;
        font-size: 13px;
        font-weight: 700;
    }

    .document_upload_div input {
        padding: 7px;
        border: 0;
        box-shadow: 1px 1px 5px;
        width: 70%;
        border-radius: 10px;
        height: fit-content;
    }

    #document_upload_id {
        text-align: start;
    }

    .document_upload_main {
        /* padding: 2vw; */
        width: 100%;
        box-shadow: 0 0 0;
        margin: 0;
    }

    .doc_submit_btn {
        padding: 0.5vw 2vw;
        border-radius: 10px;
        border: 0;
        background-color: #2f5ed4;
        color: white;
        margin: 0 1vw;

    }

    .documents_size_heading {
        font-size: 13px;

        margin-bottom: 5vh;
    }

    .usr_dash_text {

        width: 50%;
        /* text-align: center; */
        display: flex;
        flex-direction: column;
        gap: 2vw;
        text-align: center;
        justify-content: center;
        align-items: center;
        height: 70vh;
    }

    .usr_dash_text p {
        font-size: 17px;
    }

    /* user logout  */

    .user_logut_main {
        position: absolute;
        right: 0;
        display: flex;
        justify-content: space-between;
        gap: 0.5vw;
        align-items: center;
        /* margin: 2vw; */
        top: 0;
        width: 100%;

    }

    .logout_link_main {
        display: flex;
        align-items: center;
        gap: 10px;
        color: black;
        font-weight: 600;
        text-decoration: none;
    }

    .user_logut_main p {
        font-size: 18px;
        color: brown;
        font-weight: 600;
        margin: 0;
    }

    .user_logut_main img {
        width: 18px;
        height: 18px;
    }

    .login_user_div {
        display: flex;
        align-items: center;
        gap: 10px;
        justify-content: center;
    }


    /* navbar effect  */
    .navbar_main {
        display: flex;
        background-color: #2f5ed4;
        justify-content: space-between;
        gap: 0.5vw;
        padding: 0 0.5vw;
    }

    .navbar_main div {
        display: flex;
    }

    .navbar_main li {
        list-style-type: none;
        color: white;
        padding: 0.5vw 1vw;
        border-radius: 20px;
        font-weight: 800;

    }

    .navbar_main li a {
        text-decoration: none;
        color: white;
    }

    .navbar_main li:hover {
        box-shadow: 1px 1px 5px black;
        /* background-color: #a7e245; */

        /* border: 0px solid #00dff4; */

    }

    .navbar_main li a {
        text-decoration: none;
    }

    .warnning_icon {
        width: 30%;
    }

    .success_icon {
        width: 60%;
    }

    .alert_box {

        border: 5px solid white;
        width: fit-content;
        position: fixed;
        top: 30%;
        left: 49%;
        display: none;
        flex-direction: column;
        gap: 1vw;
        align-items: center;
        backdrop-filter: blur(10px);
        border-radius: 10px;
        box-shadow: 0 0 30px gray;
        padding: 1vw 3vw;
    }

    .form_box_main {


        left: 39%;




        z-index: 1;
    }

    .img_heading_container {
        width: 18vw;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .popup_btn_container {
        display: flex;
        gap: 1vw;
        margin-bottom: 0.5vw;
    }

    .popup_btn_container button {
        width: 6vw;

    }

    .password_change_main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 10px;
        padding: 2vw;
        border: 1px solid;
        border-radius: 10px;
        background-color: #f4f7ff;
        backdrop-filter: blur(10px);
    }

    .password_change_main h1 {
        font-size: 27px;
        font-weight: 600;
        box-shadow: 0 0 4px;
        padding: 0.5vw;
        border-radius: 10px;
        color: lightslategrey;
    }

    .password_change_div {
        display: flex;
        align-items: center;
        border-radius: 5px;
        padding: 7px 12px;
        gap: 10px;
        box-shadow: 0 0 4px gray;
        background-color: white;


    }

    .password_change_div input {
        border: 0;
        width: 31vw;

    }

    .remove_btn_td {
        border: 0;
        /* background-color: #2f5ed4; */
    }
    .heading_para{
        margin: 0;
        padding: 0;
        color: #010101;
        font-weight: 500;
        font-size: 12px;
        font-family: 'Roboto', sans-serif;;
        margin-bottom: 0px;
    }
    .heading_main h1{
    padding: 0;
    margin: 0 0 5px;
    font-size: 28px;
    font-weight: 600;
    color: #132aac;
    text-transform: uppercase;
    font-family:'Roboto', sans-serif;

    }
 
</style>