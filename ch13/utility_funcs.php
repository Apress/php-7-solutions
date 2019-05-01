<?php
function safe($text) {
    return htmlspecialchars($text, ENT_COMPAT|ENT_HTML5, 'UTF-8', false);
}
