<div class="filter-container">
    <form action="#" method="POST" class="filter">
        <label for="sorter etter">Sorter etter:</label>
        <select name="sort" class="dropdown">
            <option value="kjoretoy.idkjoretoy" hidden></option>
            <option value="kjoretoy.merke">Merke</option>
            <option value="kjoretoy.klasse">Klasse</option>
            <option value="kurssted.stedsnavn">Lokale</option>
            <option value="kjoretoy.år">År</option>
        </select>

        <label for="filter">Filter (Lokale):</label>
        <select name="filter" class="dropdown">
            <option value="0" hidden></option>
        <?php
                    $sql= "SELECT idkurssted, stedsnavn, adresse, nummer FROM kurssted;";
                    $result = mysqli_query($kobling, $sql);
    
                    while($row = $result->fetch_assoc()) {
                        $idkurssted = $row["idkurssted"];
                        $stedsnavn = $row["stedsnavn"];
                        $adresse = $row["adresse"];
                        $nummer = $row["nummer"];
    
                        echo '<option value=' . $idkurssted . '>' . $stedsnavn . ' - ' . $adresse . ' ' . $nummer . '</option>';
                    }
        ?>

        </select>

        <input type="submit" name="sort-filter" value="Søk" class="submit">
    </form>

    <form action="#" method="POST" class="search">
            <input type="search" name="search" class="search-bar">
    </form>
</div>
