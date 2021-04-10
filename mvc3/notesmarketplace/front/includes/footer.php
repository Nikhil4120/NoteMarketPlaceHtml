<?php

    $facebook_url = mysqli_query($connection,"SELECT value FROM systemconfiguration WHERE configurationkey = 'facebookurl'");
    if(!($facebook_url)){
        die("QUERY FAILED".mysqli_error($connection));
    }
    $facebook_url = mysqli_fetch_row($facebook_url);
    $facebook_url = $facebook_url[0];
    $twitter_url = mysqli_query($connection,"SELECT value FROM systemconfiguration WHERE configurationkey = 'twitterurl'");
    if(!($twitter_url)){
        die("QUERY FAILED".mysqli_error($connection));
    }
    $twitter_url = mysqli_fetch_row($twitter_url);
    $twitter_url = $twitter_url[0];
    $linkedin_url = mysqli_query($connection,"SELECT value FROM systemconfiguration WHERE configurationkey = 'linkedinurl'");
    if(!($linkedin_url)){
        die("QUERY FAILED".mysqli_error($connection));
    }
    $linkedin_url = mysqli_fetch_row($linkedin_url);
    $linkedin_url = $linkedin_url[0];

?>

<div class="container">
        <footer>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-12">
                    <p>
                        Copyright &copy; Tatvasoft All rights Reserved.
                    </p>
                </div>
                <div class="col-md-6 col-sm-12 col-12 text-right">
                    <ul class="social-list">
                        <li><a href="<?php echo $facebook_url; ?>" target=blank><img src="images/images/facebook.png"></a></li>
                        <li><a href="<?php echo $twitter_url; ?>" target=blank><img src="images/images/twitter.png"></a></li>
                        <li><a href="<?php echo $linkedin_url; ?>" target=blank><img src="images/images/linkedin.png"></a></li>
                    </ul>
                </div>
            </div>

        </footer>
    </div>