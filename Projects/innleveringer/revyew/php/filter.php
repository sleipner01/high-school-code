<div class="filter-container">
    <form action="#" method="POST" class="filter">
        <label for="sorter etter">Sorter etter:</label>
        <select name="sort" class="dropdown">
            <option value="revy.revy_id DESC" hidden></option>
            <option value="arrangor.navn">Arrangør</option>
            <option value="revy.instruktor">Instruktør</option>
            <option value="revy.karakter_karakter_id DESC">Karakter (Høy-lav)</option>
            <option value="revy.karakter_karakter_id">Karakter (Lav-høy)</option>
            <option value="revy.premiere">Premiere-dato</option>
            <option value="revy.siste_forestilling DESC">Siste forestillings-dato</option>
        </select>

        <label for="filter">Filter:</label>
        <select name="filter" class="dropdown">
            <option value="0" hidden></option>
        <?php
                    $sql = "SELECT arrangor_id, navn FROM arrangor;";
                    $result = mysqli_query($kobling, $sql);

                    while ($row= $result->fetch_assoc()) {
                        $arrangor_id = $row["arrangor_id"];
                        $navn = $row["navn"];

                        echo "<option value=$arrangor_id>$navn</option>";
                    }
                ?>

        </select>

        <input type="submit" name="sort-filter" value="Søk" class="submit">
    </form>

    <form action="#" method="POST" class="search">
            <input type="search" name="search" class="search-bar">
    </form>
</div>
