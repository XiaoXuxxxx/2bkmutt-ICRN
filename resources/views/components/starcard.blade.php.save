<style>
.btn-vote {
    background-color: #f17ea5;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    
}
.btn-vote:hover{
    background-color: #f48fb1	;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;

}
.btn-vote:press{
 background-color: #f48fb1   ;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;

}
.user-card-content2{
   background-color : #f1d5f0;
}
</style>
<?php
        $servername = "localhost";
        $username = "2bkmutt";
        $password = "digital2bkmutt";
        $dbname = "ICRN";

        $i = 0;
        $j = 0;
        $m = 0;
        $f = 0;
        $dorm1 = 0;
        $dorm2 = 0;
        $link = mysqli_connect($servername,$username,$password,$dbname);
        mysqli_set_charset($link, "utf8");
        $sq3 = "SELECT * FROM user_profiles JOIN departments ON user_profiles.dept_id = departments.id ORDER BY user_profiles.gender";
        $result3 = mysqli_query($link,$sq3);
        $result4 = mysqli_query($link,$sq3);

        ?>

<div class="user-card" data-camp_id="{{ $p['camp_id'] }}">
    <div class="user-card-content user-card-content2">
        <div class="row">
            <div class="col-sm-8">
                <h2>{{ $p['nickname-th'] . " (" . $p['nickname-en']  . ")" }}</h2>
		@if($p['first_name-th'] == 'NULL')
		<h5>{{ $p['title'] . $p['first_name-en'] . ' ' . $p['last_name-en'] }}</h5>
		@elseif($p['first_name-th'] != '')
                <h5>{{ $p['title'] . $p['first_name-th'] . ' ' . $p['last_name-th'] }} ({{ $p['first_name-en'] . ' ' . $p['last_name-en'] }})</h5>
                <h6>SEC{{ $p['sec'] }} |
		@endif 
		<?php 
		while($row = mysqli_fetch_array($result3)){
		if(strcmp($row['camp_id'],$p['camp_id'])==0){
			echo $row['department_abbr'] . " :: " . $row['faculty_full-en'] . " :: " . $row['department_full-en'] . " :: " . $row['faculty_full-th'] . " :: " . $row['department_full-th'];
		}

		}
		?>
		</h6>

                @if($vote == true)
                <h4>
                    <form action="" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="voteid" value="{{$p['id']}}">
                        <input type="hidden" name="startype" value="{{ $startype }}">
                        <button class="btn btn-vote btn-block"><i class="fa fa-heart"></i> Vote!!</button>
                    </form>
                </h4>
                @endif
            </div>
 <div class="col-sm-4"><center>
                <?php
                    if(isset($lazyload) && $lazyload){
                        echo '<img class="lazy img-rounded img-responsive" data-original="'. url('img/profile/'.$p['image_filename']) .'">';
                    }else{
                        echo '<img class="img-responsive" src="'. url('img/profile/'.$p['image_filename']) .'">';
                    }
                ?>
</center>
            </div>


        </div>
    </div>
</div>
