<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Database view</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../media/css/list.css"></link>
</head>
<body>
    <header>
        <h2>Viewing the database</h2>
        <h3>Filter by domain</h3>
        <div class="buttons">
        <?php while ($row = $this->data["pdoCategories"]->fetch(PDO::FETCH_OBJ)) {
            if ($row->id == $this->data['categoryFilter']) {
                echo "<a href='/database'><button class='buttonActive'>Remove filter on @" .
                $row->domain_name . " domain e-mails</button></a>";
            } else {
                $path = "/database/domain/" . $row->id;
                echo "<a href='$path'><button class='button'>Show only @" .
                $row->domain_name . " domain e-mails</button></a>";
            }
        }
        ?>
        </div>
        <h3>Sort records by:</h3>
        <form method="post">
            <select name="ORDER_BY" required="required">
                <option value="id">Sort by Date</option>
                <option value="email">Sort by Name</option>
            </select>
            <select name="orderDirection" required="required">
                <option value="DESC">in descending order</option>
                <option value="ASC">in ascending order</option>
            </select>
            <input type="text" placeholder="Search.." name="searchRequest">
            <input type="submit" value="Search">
        <?php
        if (
            isset($_SESSION['POSTDATA']['ORDER_BY']) &&
            isset($_SESSION['POSTDATA']['orderDirection'])
        ) {
            echo "<h4>Currently sorted by ";
            switch ($_SESSION['POSTDATA']['ORDER_BY']) {
                case "id":
                    echo "Date ";
                    break;
                case "email":
                    echo "Name ";
                    break;
            }
            echo "in " . strtolower($_SESSION['POSTDATA']['orderDirection']) . "ending order.</h4>";
        } else {
            echo "<h4>Currently sorted by Date, in descending order (Newest First, Default)</h4>";
        }
        if (isset($_SESSION['POSTDATA']['searchRequest'])) {
            echo "<h4>Search request:" . $_SESSION['POSTDATA']['searchRequest'] . "</h4>";
        }
        ?>
        </form>
        <hr>
    </header>
    <h3>Download records as a CSV file:</h3>
    <input type="submit" form="checkboxes" value="Download">
    <div class="article">
        <form id="checkboxes" action="/print" method="post">
        </form>
        <?php $counter = 0;
        while ($row = $this->data["pdoInfo"]->fetch(PDO::FETCH_OBJ)) {
            if (isset($_SESSION['POSTDATA']['searchRequest'])) {
                if (preg_match("/" . $_SESSION['POSTDATA']['searchRequest'] . "/", $row->email)) { ?>
                    <div class="articles">
                        <input form="checkboxes" type="checkbox" name="id<?php echo $row->id;?>" 
                        value="<?php echo $row->id; ?>">
                        <p><?php echo $row->email;?></p>
                        <p><?php echo $row->pubdate;?></p>
                        <form method="post"><a><button type="submit" class="redButton" 
                        name="deleteId" value="<?php echo $row->id;?>">Delete Record</button></a></form>
                    </div>
                    <?php
                }
            } else { ?>
                <div class="articles">
                    <input form="checkboxes" type="checkbox" name="id<?php echo $row->id;?>"
                     value="<?php echo $row->id; ?>">
                    <p><?php echo $row->email;?></p>
                    <p><?php echo $row->pubdate;?></p>
                    <form method="post"><a><button type="submit" class="redButton" name="deleteId" 
                    value="<?php echo $row->id;?>">Delete Record</button></a></form>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <div class="pagination">
        <?php
        if ($this->data['totalPages'] > 1) {
            for ($pageCounter = 1; $pageCounter <= $this->data['totalPages']; $pageCounter++) {
                if ($this->data['page'] = $pageCounter) {
                    if (isset($_SESSION['POSTDATA']['ORDER_BY'])) {
                        echo '<form style="display: inline;" method="post" class="whiteButton">' .
                        '<input type="hidden" name="pagenum" value="' . $pageCounter . '"/>' .
                        '<input type="hidden" name="ORDER_BY" value="' .
                        $_SESSION['POSTDATA']['ORDER_BY'] . '"/>' .
                        '<input type="hidden" name="orderDirection" value="' .
                        $_SESSION['POSTDATA']['orderDirection'] . '"/>' .
                        '<input type="hidden" name="searchRequest" value="' .
                        $_SESSION['POSTDATA']['searchRequest'] . '"/>' .
                        '<input type="submit" value="Page ' . $pageCounter . '"/>
                            </form>';
                    } else {
                        echo '<form method="post">' .
                        '<input type="hidden" name="pagenum" value="' . $pageCounter . '"/>' .
                        '<input type="submit" value="Page ' . $pageCounter . '"/>
                            </form>';
                    }
                }
            }
        }
        ?>
    </div>
</body>

</html>
