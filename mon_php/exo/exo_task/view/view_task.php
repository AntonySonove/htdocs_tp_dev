<main>
    <div class="row">
        <form class="column gap15" action="" method="post">
        <h2>Ajouter une task</h2>
            <p><input type="text" name="name_task" placeholder="Nom de la task"></p>
            <p><input type="text" name="content_task" placeholder="Description de la task"></p>
            <p><input type="date" name="date_task"></p>
            <p><input type="submit" name="submit" value="Ajouter"></p>
            <?= $message ?>
        </form>
        <div class="column gap15">
            <h2>Liste des task</h2>
            <?= $taskList ?>
        </div>
    </div>
    <!-- <div>
        <select name="categories" id="categories">
            <option value="<?= $menage ?>">ménage</option>
        </select> -->
    </div>
</main>