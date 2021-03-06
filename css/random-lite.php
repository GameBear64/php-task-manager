<?php
    header("Content-type: text/css; charset: UTF-8");

    function getHex() {
        $color = "#".dechex(rand(16, 255)).dechex(rand(16, 255)).dechex(rand(16, 255));
        return $color;
    }
?>

/* ========================== COLORS ========================= */
:root {
    /* global */
    --bg: <?=getHex()?>;
    --bg-text: #000000;
    --section-bg : <?=getHex()?>;
    --link-color: #000000;
    /* forms */
    --feild-bg: #ffffff;
    --feild-text: #000000;
    --submit-bg: #4CAF50;
    --submit-text: #ffffff;
    --date-after: #aaa;
    /* main */
    --main-article-even: <?=getHex()?>;
    --main-article-odd: <?=getHex()?>;
    --main-date: #808080;
    --main-missing: #ff0000;
    --main-coming: #808080;
    --main-done: #16d616;
    /* tasks */
    --opt-text: #ffffff;
    --opt-done: #4CAF50;
    --opt-undone: #a60ee2;
    --opt-edit: #1385e2;
    --opt-delete: #f71a1a;
    --opt-log: #23272A;
    --opt-reg: #23272A;
    /* profile */
    --pf-settings: #1385e2;
    --pf-logout: #f71a1a;
    /* navs */
    --nav-bg: #23272A;
    --nav-text: #ffffff;
    --nav2-bg: #23272A;
    --nav2-text: #ffffff;
    /* other */
    --alret-bg: #23272A;
    --alert-border: #ff0000;
    --alert-text: #ffffff;
    --footer-bg: #23272A;
    --footer-text: #ffffff;
}

/* ========================== Global ===================== */

body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background-color: var(--bg);
    color: var(--bg-text);
}

section {
    width: 50%;
    margin: auto;
    background-color: var(--section-bg);
}

a:link {
    text-decoration: none;
    color: var(--link-color);
}

a:visited {
    text-decoration: none;
    color: var(--link-color);
}

a:hover {
    text-decoration: underline;
}

a:active {
    text-decoration: underline;
}

/* ====================== Forms ============================== */

form {
    font-family: 'Roboto', sans-serif;
    padding: 5% 0 5% 0;
    text-align: center;
    font-size: 300%;
}

select {
    background-color: var(--feild-bg);
    color: var(--feild-text);
    font-size: 20px;
    padding: 12px 20px;
    display: inline-block;
    cursor: pointer;
}

input[type=text], input[type=password] {
    background-color: var(--feild-bg);
    color: var(--feild-text);
    font-weight: bold;
    font-size: 20px;
    padding: 12px 20px;
    display: inline-block;
    box-sizing: border-box;
}

input[type=submit] {
    font-weight: bold;
    background-color: var(--submit-bg);
    color: var(--submit-text);
    padding: 14px 20px;
    margin: 5%;
    border: none;
    cursor: pointer;
}

textarea {
    background-color: var(--feild-bg);
    color: var(--feild-text);
    display: block;
    padding: 12px 20px;
    font-weight: bold;
    font-size: 20px;
    margin: auto;
    resize: vertical;
    width: 50%;
    height: 15%;
}

/* login and register */

.login {
    margin-top: 5%;
    padding: 1% 0 0 0;
    width: 30%;
}

.login>h1 {
    text-align: center;
    font-size: 40px;
}

.log> input[type=text],.log> input[type=password] {
    margin: 8px 0;
    width: 70%;
}

.log> input[type=submit] {
    width: 30%;
}

.opt-reg {
    background-color: var(--opt-reg);
}

.opt-log {
    background-color: var(--opt-log);
}

/* main */

input[type="date"] {
    background-color: var(--feild-bg);
    color: var(--feild-text);
}

input[type="date"]::after {
    content: attr(placeholder) !important;
    color: var(--date-after);
    margin-right: 0.5em;
}

.post> input[type=text] {
    font-weight: bold;
    font-size: 20px;
    width: 70%;
    padding: 12px 20px;
    box-sizing: border-box;
    float: left;
}

.post> input[type=date] {
    font-weight: bold;
    font-size: 20px;
    width: 30%;
    padding: 8.5px 20px;
    box-sizing: border-box;
    float: right;
}

.post> input[type=submit] {
    font-weight: bold;
    width: 20%;
    background-color: var(--submit-bg);
    color: var(--submit-text);
    padding: 10px;
    margin: 5px 0;
    border: none;
    cursor: pointer;
    font-weight: bold;
    font-size: 20px;
    float: left;
}

.post {
    width: 85%;
    margin: auto;
    padding: 20px;
    padding-top: 3%;
}

.post>h1 {
    text-align: left;
    font-size: 40px;
}

.post textarea {
    width: 100%;
}

/* ================= Main ============== */

article {
    padding: 10px 20px;
}

article:nth-of-type(odd) {
    background-color: var(--main-article-even);
}

article:nth-of-type(even) {
    background-color: var(--main-article-odd);
}

.notasks {
    font-size: 300%;
    text-align: center;
    padding: 10%;
}

article>h3 {
    font-size: 150%;
    margin: 0;
    text-decoration: none;
}

article>p {
    margin: 10px 0;
}

.description {
    padding: 20px 0 0 0;
}

hr {
    margin: 0;
}

/* Tags */

.dates {
    color:var(--main-date);
}

.tag {
    float: right;
    font-size: 150%;
}

.coming {
    border-left: 5px solid var(--main-coming);
}
.coming>.tag {
    color: var(--main-coming);
}

.missing {
    border-left: 5px solid var(--main-missing);
}
.missing>.tag {
    color: var(--main-missing);
}

.done {
    border-left: 5px solid var(--main-done);
}
.done>.tag {
    color: var(--main-done);
}



/* ================= Tasks ===================== */

.options {
    display: flex;
    justify-content: space-between;
}

.options p {
    text-align: center;
    width: 35%; 
    color: var(--opt-text);
    padding: 10px;
    margin: 0;
    border: none;
    font-size: 20px;
}

.options a {
    color: var(--opt-text);
    cursor: pointer;
}

.markdone {
    background-color: var(--opt-done);
}

.markundone {
    background-color: var(--opt-undone);
}

.edit {
    background-color: var(--opt-edit);
}

.delete {
    background-color: var(--opt-delete);
}

/* ================= Profile ======================= */

.profile {
    margin-top: 5%;
    width: 30%;
}

.profile h2 {
    text-align: center;
    font-size: 40px;
    padding-top: 5%;
}

.info {
    margin: 5%;
}

.psettings {
    background-color: var(--pf-settings);
}

.logout {
    background-color: var(--pf-logout);
}

.settings input[type=text],.settings  input[type=password] {
    font-weight: bold;
    font-size: 20px;
    width: 40%;
    padding: 12px 20px;
    margin: 1%;
    display: inline-block;
    box-sizing: border-box;
}

.settings input[type=submit] {
    width: 15%;
    background-color: var(--submit-bg);
    color: var(--submit-text);
    padding: 14px 20px;
    margin: 5%;
    border: none;
    cursor: pointer;
}

.settings {
    padding: 2% 0;
}

.settings h1 {
    text-align: center;
    font-size: 400%;
}

.settings h3 {
    font-size: 80%;
}

.settings form {
    margin: 0;
    padding: 0
}

/* ================= Nav Bars ===================== */
nav {
    background-color: var(--nav-bg);
    position: sticky;
    top: 0;
    text-align: left;
    padding-left: 2%;
    font-size: x-large;
}

nav a:link, nav a:visited {
    float: right;
    line-height: 200%;
    color: var(--nav-text);
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
}
  
nav a:hover, nav a:active {
    text-decoration: underline;
}

nav p {
    color: var(--nav-text);
    line-height: 300%;
    padding-top: 0;
    display: inline;
}

.nav-2 {
    background-color: var(--nav2-bg);
    text-align: center;
    padding-left: 2%;
    font-size: x-large;
}

.nav-2 a:link, .nav-2 a:visited {
    line-height: 200%;
    color: var(--nav2-text);
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
}
  
.nav-2 a:hover, .nav-2 a:active {
    text-decoration: underline;
}

/* other */

.alert {
    background:var(--alret-bg);
    border-left: 6px solid var(--alert-border);
    color: var(--alert-text);
    border-radius: 0px 10px 10px 0px;
    margin: auto;
    top: 50px;
    width: 90%;
    padding: 10px;
}

/* footer */
footer {
    position:fixed;
    bottom:0;
    width: 100%;
    height: 2.5rem;
    text-align: center;
    background-color: var(--footer-bg);
    color: var(--footer-text);
}