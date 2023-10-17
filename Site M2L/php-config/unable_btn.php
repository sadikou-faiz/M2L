<?php 
                            //rendre le boutton, postuler innutilisable quand on est déconnecté
                              if(!isset($_SESSION['user'])){
                                echo "<p class='reduce'>Connectez-vous pour postuler</p>"
                                ?>
                                <style>
                                   .date-btn .disable {
                                        cursor: default;
                                        pointer-events: none;        
                                        color: #fff;
                                        background-color: #8cb6ec;
                                    }
                                </style>
                                <?php
                              }
                              else {
                                   ?>
                                  <style>
                                    .date-btn  .disable {
                                       pointer-events: visible;
                                       cursor: pointer;
                                    }
                                </style>
                                   <?php
                              }
                                
                            ?>