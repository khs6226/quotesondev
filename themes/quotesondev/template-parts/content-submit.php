<?php
/**
 * Template part for displaying page content.
 *
 * @package QOD_Starter_Theme
 */
?>

<form action="" class="submit-form">
    <label for="author">
        <p class="submit_p">Author of Quote</p>
        <input type="text" name="author" class="author">
    </label>

    <label for="content">
        <p class="submit_p">Quote</p>
        <textarea name="content" class="content"></textarea>
    </label>

    <label for="source">
        <p class="submit_p">Where did you find this quote? (e.g. book name)</p>
        <input type="text" name="source" class="source">
    </label>

    <label for="url">
        <p class="submit_p">Provide the url of the quote source, if available</p>
        <input type="url" name="url" class="url">
    </label>

    <p class="submit_p"><button class="submit-button" type="button">Submit Quote</button></p>
</form>