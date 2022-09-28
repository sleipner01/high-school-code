<div class="filter-container">
    <form action="#" method="POST" class="filter">
        <label for="sorter etter">Sorter etter:</label>
        <select name="sort" class="dropdown">
            <option value="kurs.idkurs" hidden></option>
            <option value="kurs.kurs">Kurs</option>
            <option value="kurs.dato">Dato</option>
            <option value="kurs.dato DESC">Dato synkende</option>
            <option value="kurs.pris">Pris lav-høy</option>
            <option value="kurs.pris DESC">Pris høy-lav</option>
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
