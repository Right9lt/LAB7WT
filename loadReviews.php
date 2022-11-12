<? 
require_once __DIR__ . "/pdo.php";
session_start(); 
$reviews = $pdo->query("SELECT * FROM reviews")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($reviews as $review) {
            ?>
                <div class="card" style="width: 100%; margin-bottom: 1em;">
                    <div class="card-body">
                        <h5 class="card-title"><? $query = $pdo->prepare("SELECT * FROM user WHERE Id=:Id");
                                                $query->execute(["Id" => $review["UserId"]]);
                                               $user=$query->fetch(PDO::FETCH_ASSOC);
                                                echo($user["Login"]);
                                                ?></h5>

                        <p class="card-text"><?=$review["Text"]?></p>
                    </div>
                </div>
               
            <?
            }
            ?>