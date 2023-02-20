		
		
		<div class="chat-page">
			<!-- Page Content -->
			<div class="content" style="min-height:205px;">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12">
							<div class="chat-window">
							
								<!-- Chat Left -->
								<div class="chat-cont-left">
									<div class="chat-header">
										<span>Chats</span>
										<a href="javascript:void(0)" class="chat-compose">
						<!--					<i class="material-icons">control_point</i>
						-->				</a>
									</div>
					<!--				<form class="chat-search">
										<div class="input-group">
											<div class="input-group-prepend">
												<i class="fas fa-search"></i>
											</div>
											<input type="text" class="form-control" placeholder="Search">
										</div>
									</form>
					-->				<div class="chat-users-list">
										<div class="chat-scroll">
										    <div id="chat_members"></div>
										
									
										</div>
									</div>
								</div>
								<!-- /Chat Left -->
							
								<!-- Chat Right -->
								<div class="chat-cont-right">
									<div class="chat-header">
										<a id="back_user_list" href="javascript:void(0)" class="back-user-list">
											<i class="material-icons">chevron_left</i>
										</a>
										<div class="media">
											<div class="media-img-wrap">
												<div class="avatar avatar-online">
													<img id="user_img" src="<?php if($doctor->image != ''){ echo base_url('assets/img/doctors/').$doctor->image; } else { echo 'http://cureu.in/assets/img/doctors/123.png';  } ?>" alt="User Image" class="avatar-img rounded-circle">
												</div>
											</div>
											<div class="media-body">
												<div class="user-name">  <span id="user_name"><?php echo $doctor->name; ?></span>  <?php echo '<span id="sender_id" style="display:none;">'.$doctor->user_id.'</span>'; ?> </div>
			<!--									<div class="user-status">online</div>
			-->								</div>
										</div>
			<!--							<div class="chat-options">
											<a href="javascript:void(0)" data-toggle="modal" data-target="#voice_call">
												<i class="material-icons">local_phone</i>
											</a>
											<a href="javascript:void(0)" data-toggle="modal" data-target="#video_call">
												<i class="material-icons">videocam</i>
											</a>
											<a href="javascript:void(0)">
												<i class="material-icons">more_vert</i>
											</a>
										</div>
			-->						</div>
									<div class="chat-body">
									    
										<div class="chat-scroll" id="chat-scroll">
											<ul class="list-unstyled">
											    <div class="mt-2" id="getchat"></div>
												
										   <!-- main chat -->		
										
											</ul>
										</div>
									
									</div>
									<div class="chat-footer">
										<div class="input-group">
											<!--div class="input-group-prepend">
												<div class="btn-file btn">
													<i class="fa fa-paperclip"></i>
													<input type="file">
												</div>
											</div-->
											
											<input type="text" class="input-msg-send form-control  send_messagee" id="message" placeholder="Type something" autofocus>
											<div class="input-group-append">
												<button type="button" id="send_message" class=" btn msg-send-btn"><i class="fab fa-telegram-plane"></i></button>
											</div>
										</div>
									</div>
								</div>
								<!-- /Chat Right -->
								
							</div>
						</div>
					</div>
					<!-- /Row -->

				</div>

			</div>		
			<!-- /Page Content -->
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<script>
         
        function scrollup(){
            $("#chat-scroll").animate({ 
                    scrollTop: $( 
                      '#chat-scroll').get(0).scrollHeight 
            }, 1);
        } 
        
        function chat_members(){
            var user_id;
            user_id = "<?php echo $this->session->userdata('user_id') ?>";
            $.ajax({
               url:'<?php echo base_url("inbox/chat_members") ?>',
               type:'post',
               data: {user_id:user_id},
               dataType:'json',
               success:function(data){
                     $('#chat_members').html(data);
                    // $('[data-toggle="popover"]').popover();
               }
            });
        } 
        
        function chat(id){
        //    alert(id);
			// console.log(id);
            $.ajax({
               url:'<?php echo base_url("inbox/chat") ?>',
               type:'post',
               data: {sender_id:id},
               dataType:'json',
               success:function(data){
				
                     $('#sender_data').html(data.name);
                     $('#getchat').html(data.output);
                    scrollup();                     
                   }
            });
        }
   
        function send_message(id,message){
			
            $.ajax({
               url:'<?php echo base_url("inbox/send_message") ?>',
               type:'post',
               data: {receiver_id:id,message:message},
               dataType:'json',
               success:function(data){
                   console.log(data);
                 //  alert(data);
                   chat(id);
                   chat_members();
                   $("send_message").prop('disabled', false);
                   $('#message').val('');         
                   scrollup();
                }
            });
        }
        
        function member_serach(val){
            $.ajax({
               url:'<?php echo base_url("inbox/member_serach") ?>',
               type:'post',
               data: {val:val},
               dataType:'json',
               success:function(data){
                  // alert(data);
                   $('#search_list_members').html(data);
    /*               chat(id);
                   chat_members();
                   $("send_message").prop('disabled', false);
                   $('#message').val('');                     
    */            }
            });
        }
   
        $(document).ready(function(){
           
            chat_members();
            var send_id = $('#sender_id').text();
			
             setInterval(function(){ chat(send_id);}, 6000); 
			 chat(send_id);
			
            $(document).off('click','.chat_list').on('click','.chat_list', function(){
                var id;
                var user_img = $(this).attr('user-img');      
                var user_name = $(this).attr('user-name');
                $('#user_img').attr('src', user_img);
                $('#user_name').text(user_name);
                id = $(this).attr('data-id');
				 send_id=$('#sender_id').text(id);
                chat(id);                                    // chat call
            });
         
            $('#send_message').click(function (){
                var message='';
                var receiver_id='';
            
                message = $('#message').val(); 
              receiver_id = $('#sender_id').text();
			 
              //  alert(receiver_id+' : '+message);
                if($('#sender_id').text() == ''){
                    alert('Please select any user then send Message...'); 
                }
                else if($('#message').val() == ''){
                    alert('Please Enter Message');
                }
                else{
                    $("send_message").prop('disabled', true);
                    send_message(receiver_id, message);        
                }
            });
             
            //serach members
            $('#member_serach').keyup(function(){
                  member_serach($('#member_serach').val());
            });
            
            $('#member_serach').change( function(){
                chat($('#member_serach').val());
            });
            
           
          
        });
         
        $(document).ready(function(){
           
            $('#action_menu_btn').click(function(){
            	$('.action_menu').toggle();
            });
        });
		
	/* 	 $('#someTextBox').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        alert('You pressed a "enter" key in textbox');  
    }
}); */
		 
		 $('.send_messagee').keypress(function(event){
			 var keycode = (event.keyCode ? event.keyCode : event.which);
			  if(keycode == '13'){
                var message='';
                var receiver_id='';
            
                message = $('#message').val(); 
                
               
              receiver_id = $('#sender_id').text();
              //  alert(receiver_id+' : '+message);
                if($('#sender_id').text() == ''){
                    alert('Please select any user then send Message...'); 
                }
                else if($('#message').val() == ''){
                    alert('Please Enter Message');
                }
                else{
                    $("send_message").prop('disabled', true);
                    send_message(receiver_id, message);        
                }
			  }
            });
      </script>