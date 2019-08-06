<?php
/**
 * Template part for displaying page content.
 *
 * @package QOD_Starter_Theme
 */
?>

<form action="" id="submit-form">
    <label for="author">
        Author of Quote
        <input type="text" name="author" id="author">
    </label>

    <label for="content">
        Quote
        <textarea name="content" id="content"></textarea>
    </label>

    <label for="source">
        Where did you find this quote? (e.g. book name)
        <input type="text" name="source" id="source">
    </label>

    <label for="url">
        Provide the url of the quote source, if available
        <input type="url" name="url" id="url">
    </label>

    <button class="submit-button" type="submit">Submit Quote</button>
</form>