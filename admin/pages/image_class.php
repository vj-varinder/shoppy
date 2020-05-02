<?php

// include($basepath.'/config/config.php');
// include($basepath.'/libraries/Database.php');
// include 'index.php';


class Image
{
    var $basepath;
    var
    $prodId,
    $image_name,
    $image,
    $db;


    function insert_into_image()
    {


        if($_FILES["txt_image"])
        {
            $tempname = $_FILES["txt_image"]["tmp_name"];
            $orignalname = $_FILES["txt_image"]["name"];
            $size = ($_FILES["txt_image"]["size"]/5242880)."MB<br>";
            $type = $_FILES["txt_image"]["type"];
            $image = $_FILES["txt_image"]["name"];
            move_uploaded_file($_FILES["txt_image"]["tmp_name"], $this->basepath."/"."upload_image/".$_FILES["txt_image"]["name"]);
        }

        // echo "ProdId, ImgName, Image, AltText: ".$this->prodId.", ".$this->image_name.", ".$image.", ".$this->image_name;
        $query = "insert into tb_image
        (
            dbProductId,
            dbImageName,
            dbImagePath,
            dbImageAltText
            )
            values
            (
                $this->prodId,
                '$this->image_name',
                '$image',
                '$this->image_name'
                )";

                if($this->db->insert($query))
                {
                    // echo "<script language='javascript' type = 'text/javascript'>
                    // alert('Image Uploaded');
                    // </script>
                    // ";
                    echo "Row updated successfully click <a href='products.php'>here</a> to view all products";
                }
                else {
                    // echo "<script language='javascript' type='text/javascript'>
                    // alert('Image not Uploaded');
                    // </script>
                    // ";
                    echo "Image not Uploaded. Please try again.";
                }
            }

            // function get_all_image_list()
            // {
            //     $query = "SELECT
            //     *
            //     FROM
            //     t_image_upload";
            //
            //     $result = mysql_query($query);
            //     return $result;
            // }

        }

        ?>
