<link rel="stylesheet" href="register.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php include '../navbar/navbar.php' ?>
<div id="container">
    <fieldset>
        <legend>
            <img src="user.png">
        </legend>

        <table id="tab">
         <form method="POST" action="registration.php">
             <tr>
                 <td></td>
                 <td id="errors">
                     <?php
                        if(isset($_GET['phoneerror'])&&isset($_GET['emailerror'])
                                &&isset($_GET['passworderror'])){
                            if(!empty($_GET['phoneerror'])) echo $_GET['phoneerror']."<br>";
                            if(!empty($_GET['emailerror'])) echo $_GET['emailerror']."<br>";
                            if(!empty($_GET['passworderror'])) echo $_GET['passworderror']."<br>";
                        }else{
                            if(isset($_GET['register'])){
                            if(!empty($_GET['register'])) echo $_GET['register']."<br>";
                        }
                    }
                     ?>
                 </td>
             </tr>
            <tr>
                <td class="icon">
                <svg  width="20" height="20" fill="#068da5"  viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                </svg>
                </td>
                <td>
                    <input type="text" name="fname" placeholder="FirstName">
                </td>
            </tr>

            <tr>
                <td class="icon">
                <svg  width="20" height="20" fill="#068da5"  viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                </svg>
                </td>
                <td>
                <input type="text" name="lname" placeholder="LastName">
                </td>
            </tr>

            <tr>
                <td class="icon">
                <svg  width="20" height="20" fill="#068da5"  viewBox="0 0 16 16">
                <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>
                </td>
                <td>
                <input type="date" name="date">
                </td>
            </tr>

            <tr>
                <td class="icon">
                <svg width="20" height="20" fill="#068da5" viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                </svg>
                </td>
                <td>
                <input type="password" name="password" placeholder="Password">
                </td>
            </tr>

            <tr>
                <td class="icon">
                <svg  width="20" height="20" fill="#068da5"  viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                </svg>
                </td>
                <td>
                <input type="password" name="repassword" placeholder="Re-type Password">
                </td>
            </tr>
            
            <tr>
                <td class="icon">
                <svg  width="20" height="20" fill="#068da5"  viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                </svg>
                </td>
                <td>
                <input type="email" name="email" placeholder="Email">
                </td>
            </tr>

            <tr>
                <td class="icon">
                <svg  width="20" height="20" fill="#068da5"  viewBox="0 0 16 16">
                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                </svg>
                </td>
                <td>
                <input type="text" name="phone" placeholder="Phone Number (+961)" class="phone">
                </td>
            </tr>

            <tr>
                <td class="icon">
                <svg  width="20" height="20" fill="#068da5"  viewBox="0 0 16 16">
                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
                </td>
                <td>
                <select name="governorate" id="governorate" class="action" size="3">
                <!-- <option value="">Select Governorate</option> -->
                <?php
                $connect = mysqli_connect("localhost", "root", "", "web3_project");
                $country = '';
                $query = "SELECT governorate FROM location GROUP BY governorate ORDER BY governorate ASC";
                $result = mysqli_query($connect, $query);
                while($row = mysqli_fetch_array($result))
                        {
                            $country .= '<option value="'.$row["governorate"].'">'.$row["governorate"].'</option>';
                        } 
                echo $country;        ?>
                </select>
                </td>
            </tr>

            <tr>
                <td class="icon">
                <svg  width="20" height="20" fill="#068da5" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
                </svg>
                </td>
                <td>
                <select name="district" id="district"  size="3" class="action">
                <!-- <option value="">Select District</option> -->
                </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" class='recap'>
                <div class="recaptcha">
                <label><input type="checkbox" name="recaptcha">
                I&apos;m not a robot</label>
                <img src="recaptcha.jpg">
                </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="button">
                    <input type="submit" name="submit" value="Sign Up">
                    <input type="reset" value="Clear">
                </td>
            </tr>
        </form>
        </table>
    </fieldset>
</div>
<script src="register.js"></script>
<?php include '../footer/footer.php' ?>