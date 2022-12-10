<?php
session_start();
$user=user($conn);
$value=$user[0]['id'];
setcookie("id", "$value","Session", "/","", 0);
 ?>
<!doctype html>
<html lang="en">

  <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Quick Chat App">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="img/fav.png" />

		<!-- Title -->
		<title>Quick Chat App</title>


		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<!-- Main css -->
		<link rel="stylesheet" href="css/main.css">


		<!-- *************
			************ Vendor Css Files *************
		************ -->

	</head>
	<body>

		<!-- Loading wrapper start -->
		<div id="loading-wrapper">
			<div class="spinner-border"></div>
		</div>
		<!-- Loading wrapper end -->

		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- Sidebar wrapper start -->
			<nav class="sidebar-wrapper">

				<!-- Sidebar content start -->
				<div class="sidebar-tabs">

					<!-- Tabs Nav Start -->
					<div class="nav" role="tablist" aria-orientation="vertical">
						<a href="#" class="logo">
							<img src="img/logo.svg" alt="Quick Chat">
						</a>
						<a class="nav-link active" id="chats-tab" data-toggle="pill" href="#tab-chats" role="tab" aria-controls="tab-chats" aria-selected="true">
							<img src="img/home.svg" alt="Chats">
							<span class="nav-link-text">Chats</span>
						</a>
						<a class="nav-link" id="profile-tab" data-toggle="pill" href="#tab-profile" role="tab" aria-controls="tab-profile" aria-selected="false">
							<img src="img/profile1.svg" alt="Profile">
							<span class="nav-link-text">Profile</span>
						</a>
						<a class="nav-link" id="contacts-tab" data-toggle="pill" href="#tab-contacts" role="tab" aria-controls="tab-contacts" aria-selected="false">
							<img src="img/contacts1.svg" alt="Contacts">
							<span class="nav-link-text">Contacts</span>
						</a>
						<a class="nav-link" id="groups-tab" data-toggle="pill" href="#tab-groups" role="tab" aria-controls="tab-groups" aria-selected="false">
							<img src="img/groups.svg" alt="Groups">
							<span class="nav-link-text">Groups</span>
						</a>
						<a class="nav-link" id="settings-tab" data-toggle="pill" href="#tab-settings" role="tab" aria-controls="tab-settings" aria-selected="false">
							<img src="img/settings.svg" alt="Settings">
							<span class="nav-link-text">Settings</span>
						</a>
						<a href="login.html" class="nav-link mt-auto">
							<img src="img/logout.svg" alt="Logout">
						</a>
					</div>
					<!-- Tabs Nav End -->

					<!-- Tabs Content Start -->
					<div class="tab-content">

						<!-- Chat Tab -->
						<div class="tab-pane fade show active" id="tab-chats" role="tabpanel" aria-labelledby="chats-tab">

							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Chats
							</div>
							<!-- Tab content header end -->

							<!-- Chat users container start -->
							<div class="chat-users-container">

								<!-- Search Container Start -->
								<div class="search-container">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search Chat" />
									</div>
								</div>
								<!-- Search Container End -->

								<!-- Recent Chat List Start -->
								<div class="recent-chat-list">
									<h5>Recent</h5>
									<ul class="chat-cards">
										<li>
											<a href="#">
												<div class="user-avatar">
													<span class="status offline"></span>
													<img src="img/user7.png" alt="Avatar">
												</div>
												<h5>Lewis Morrison</h5>
												<!-- <h6>21 mins ago</h6> -->
												<div class="video-chat-icons">
													<div class="video-chat">
														<img src="img/icon-video-call.svg" alt="Video Call">
													</div>
													<button type="button" class="recent-delete">
														<img src="img/icon-trash.svg" alt="Delete">
													</button>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="user-avatar">
													<span class="status online"></span>
													<img src="img/user2.png" alt="Avatar">
												</div>
												<h5>Dona Orchaard</h5>
												<!-- <h6>29 mins ago</h6> -->
												<div class="video-chat-icons">
													<div class="video-chat">
														<img src="img/icon-chat.svg" alt="Video Call">
													</div>
													<button type="button" class="recent-delete">
														<img src="img/icon-trash.svg" alt="Delete">
													</button>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="user-avatar">
													<span class="status busy"></span>
													<img src="img/user5.png" alt="Avatar">
												</div>
												<h5>Alice Horbachev</h5>
												<!-- <h6>37 mins ago</h6> -->
												<div class="video-chat-icons">
													<div class="video-chat">
														<img src="img/icon-chat.svg" alt="Video Call">
													</div>
													<button type="button" class="recent-delete">
														<img src="img/icon-trash.svg" alt="Delete">
													</button>
												</div>
											</a>
										</li>
									</ul>
								</div>
								<!-- Recent Chat List End -->

								<!-- Users Container Start -->
								<div class="users-container">

									<!-- Users container scroll start -->
									<div class="usersContainerScroll">
										<ul class="users-list  post-filter has-dynamic-filters-counter list-unstyled">
                    <?php foreach ($user as $key => $value): ?>
                      <?php if($_SESSION['id']!=$value['id']): ?>
											  <li style="cursor:pointer">
												<a onclick="loadImage(this); " data-filter="1" data-id="<?=$value['id']?>">
													<div class="chat-avatar">
                          <?php if(isset($value['active'])): ?>
                            <?php if($value['active']=="online"){ ?>
														<span class="status <?=$value['active']?>"></span>
                          <?php }else{ ?>
                            <span class=""></span>
                          <?php } ?>
                          <?php endif;  ?>
                          <!-- <div class="thumbnails" style="url"  onclick="loadImage(this)" alt="" />
                          </div> -->
														<div class="bg-avatar blue">JO</div>
													</div>
													<div class="users-list-body">
														<div class="chat-msg">
															<h6 class="text-truncate"><?=$value['username']?></h6>
															<p class="text-truncate">Hey! there I'm available.</p>
														</div>
														<div class="chat-time">
															<span class="count">7</span>
															<span class="time">5 Mins</span>
														</div>
													</div>
												</a>
											</li>


                      <?php endif ?>
                    <?php endforeach; ?>
										</ul>
									</div>
									<!-- Users container scroll end -->

								</div>

                <script type="text/javascript">
                  function loadImage(element){
                    console.log(element.placeholder);
                    window.history.pushState({page: ""}, " ", "dashboard?id="+element.dataset.id);
                    window.location.reload()
                  }
                </script>
								<!-- Users Container End -->

							</div>
							<!-- Chat users container end -->

						</div>

						<!-- User Profile Tab -->
						<div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="profile-tab">

							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Profile
							</div>
							<!-- Tab content header end -->

							<!-- Sidebar user profile start -->
							<div class="sidebar-user-profile">

								<!-- User profile start -->
								<div class="user-profile">
									<img src="img/user2.png" alt="User Profile" />
									<div class="dropdown online-status">
										<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="online">Online</span>
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item online" href="#">Online</a>
											<a class="dropdown-item busy" href="#">Busy</a>
											<a class="dropdown-item offline" href="#">Offline</a>
										</div>
									</div>
									<h5><?=$_SESSION['name']?></h5>
									<!-- <h6>Bern, Switzerland</h6> -->
								</div>
								<!-- User profile end -->

							</div>
							<!-- Sidebar user profile end -->

							<!-- Sidebar profile container start -->
							<div class="sidebar-profile-container">

								<div class="sidebarProfilesHeight">

									<!-- User profile list items start -->
									<h5>Stats</h5>
									<div class="user-profile-list-items">
										<div class="profile-list-item">
											<h5 class="text-success">300</h5>
											<h6>Friends</h6>
										</div>
										<div class="profile-list-item">
											<h5 class="text-danger">250</h5>
											<h6>Photos</h6>
										</div>
										<div class="profile-list-item">
											<h5 class="text-info">9/10</h5>
											<h6>Rating</h6>
										</div>
									</div>
									<!-- User profile list items end -->

									<!-- Media starts -->
									<h5>Media</h5>
									<div class="photos-container">
										<img src="img/media-1.jpg" alt="Image" />
										<img src="img/media-2.jpg" alt="Image" />
										<img src="img/media-3.jpg" alt="Image" />
										<img src="img/media-4.jpg" alt="Image" />
										<img src="img/media-5.jpg" alt="Image" />
										<img src="img/media-6.jpg" alt="Image" />
										<img src="img/media-7.jpg" alt="Image" />
										<img src="img/media-8.jpg" alt="Image" />
									</div>
									<!-- Media ends -->

									<!-- Files & Docs starts -->
									<h5>Files &amp; Docs</h5>
									<div class="sidebar-docs-container">
										<a href="#" class="attached-file">
											<div class="attachment-type">
												<img src="img/folder.svg" alt="Folder" />
											</div>
											<div class="attachment-text">designers_profiles.zip</div>
											<div class="download-doc">
												<img src="img/download.svg" alt="Download" />
											</div>
										</a>
										<a href="#" class="attached-file">
											<div class="attachment-type">
												<img src="img/folder.svg" alt="Folder" />
											</div>
											<div class="attachment-text">admin_files.zip</div>
											<div class="download-doc">
												<img src="img/download.svg" alt="Download" />
											</div>
										</a>
										<a href="#" class="attached-file">
											<div class="attachment-type">
												<img src="img/folder.svg" alt="Folder" />
											</div>
											<div class="attachment-text">designers_profiles.zip</div>
											<div class="download-doc">
												<img src="img/download.svg" alt="Download" />
											</div>
										</a>
									</div>
									<!-- Files & Docs ends -->

								</div>
							</div>
							<!-- Sidebar profile container end -->

						</div>

						<!-- Contacts Tab -->
						<div class="tab-pane fade" id="tab-contacts" role="tabpanel" aria-labelledby="contacts-tab">

							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Contacts
							</div>
							<!-- Tab content header end -->

							<!-- Invite Friend start -->
							<div class="invite-friend-block">
								<div class="field-wrapper-group">
									<div class="field-wrapper">
										<input type="email" placeholder="Enetr Email ID"/>
										<div class="field-placeholder">Email ID</div>
									</div>
									<button class="btn btn-primary">Invite</button>
								</div>
							</div>
							<!-- Invite Friend end -->

							<!-- Search Container Start -->
							<div class="search-container">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search Contacts">
								</div>
							</div>
							<!-- Search Container End -->

							<!-- Contacts list start -->
							<div class="contacts-container">
								<ul class="contacts-list">
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status busy"></span>
												<img src="img/user2.png" alt="Avatar">
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Aiden Chavez</h6>
													<p class="text-truncate">IOS Developer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status offline"></span>
												<div class="contacts-bg-avatar blue">AM</div>
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Anton Mikhaltsov</h6>
													<p class="text-truncate">Frontend Developer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status away"></span>
												<div class="contacts-bg-avatar green">BK</div>
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Bettina Kelx</h6>
													<p class="text-truncate">UI Developer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status online"></span>
												<div class="contacts-bg-avatar yellow">BM</div>
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Brendon McCullum</h6>
													<p class="text-truncate">UX Designer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status busy"></span>
												<img src="img/user16.png" alt="Avatar">
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Dustin Lane</h6>
													<p class="text-truncate">Scrum Master</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status away"></span>
												<img src="img/user9.png" alt="Avatar">
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Dora Mac</h6>
													<p class="text-truncate">Frontend Developer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status offline"></span>
												<img src="img/user15.png" alt="Avatar">
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Ella Wolff</h6>
													<p class="text-truncate">Team Lead</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status busy"></span>
												<div class="contacts-bg-avatar red">EW</div>
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Emay Walter</h6>
													<p class="text-truncate">IOS Developer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status busy"></span>
												<div class="contacts-bg-avatar yellow">JL</div>
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Johanna Lee</h6>
													<p class="text-truncate">Frontend Developer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status online"></span>
												<div class="contacts-bg-avatar green">JO</div>
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Jane Orchard</h6>
													<p class="text-truncate">UX Designer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status busy"></span>
												<img src="img/user21.png" alt="Avatar">
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Kori Thomos</h6>
													<p class="text-truncate">Frontend Developer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status busy"></span>
												<div class="contacts-bg-avatar blue">LG</div>
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Liams Gody</h6>
													<p class="text-truncate">Team Leader</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status busy"></span>
												<div class="contacts-bg-avatar yellow">LN</div>
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Leo Natsume</h6>
													<p class="text-truncate">UI Developer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status offline"></span>
												<div class="contacts-bg-avatar pink">MK</div>
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Markus Kyle</h6>
													<p class="text-truncate">Fullstsck Developer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status away"></span>
												<div class="contacts-bg-avatar blue">NA</div>
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Nuo Anastasia</h6>
													<p class="text-truncate">Frontend Developer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status online"></span>
												<img src="img/user16.png" alt="Avatar">
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Nuex Moi</h6>
													<p class="text-truncate">UI Developer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status busy"></span>
												<img src="img/user19.png" alt="Avatar">
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Sam Curran</h6>
													<p class="text-truncate">UX Designer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status away"></span>
												<div class="contacts-bg-avatar violet">SE</div>
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Sarah Esther</h6>
													<p class="text-truncate">UX Designer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status online"></span>
												<img src="img/user7.png" alt="Avatar">
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Tressa Joe</h6>
													<p class="text-truncate">Android Developer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status away"></span>
												<img src="img/user23.png" alt="Avatar">
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Voila Dio</h6>
													<p class="text-truncate">UX Designer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="contacts-avatar">
												<span class="status busy"></span>
												<div class="contacts-bg-avatar blue">VP</div>
											</div>
											<div class="contacts-list-body">
												<div class="contacts-msg">
													<h6 class="text-truncate">Vincent Porter</h6>
													<p class="text-truncate">Frontend Developer</p>
												</div>
											</div>
											<div class="contacts-list-actions">
												<div class="action-block">
													<img src="img/dots.svg" alt="Actions">
												</div>
												<div class="action-list">
													<span class="action-list-item">Block User</span>
													<span class="action-list-item">Remove User</span>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<!-- Contacts list end -->

						</div>

						<!-- User Groups Tab -->
						<div class="tab-pane fade" id="tab-groups" role="tabpanel" aria-labelledby="groups-tab">

							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Groups
							</div>
							<!-- Tab content header end -->

							<!-- Group container start -->
							<div class="group-container">

								<!-- Create group start -->
								<div class="create-group">
									<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#createGroup">Create Group</button>
								</div>
								<!-- Create group end -->

							</div>
							<!-- Group container end -->

							<!-- Group chat list start -->
							<div class="group-chat-list">
								<ul class="group-chat-cards">
									<li>
										<a href="#">
											<div class="group-avatar">
												<img src="img/group4.svg" alt="Group Image">
											</div>
											<h5 class="text-truncate">UX Designers</h5>
											<div class="stacked-images">
												<img src="img/user2.png" alt="Group Image">
												<img src="img/user3.png" alt="Group Image">
												<img src="img/user5.png" alt="Group Image">
												<img src="img/user6.png" alt="Group Image">
												<img src="img/user7.png" alt="Group Image">
												<img src="img/user8.png" alt="Group Image">
												<span class="plus">+5</span>
											</div>
											<div class="group-chat-actions">
												<button class="edit-group" data-toggle="modal" data-target="#editGroup">
													<img  src="img/edit.svg" alt="Edit Group" />
												</button>
												<button class="delete-group">
													<img src="img/delete.svg" alt="Delete Group" />
												</button>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="group-avatar">
												<img src="img/group5.svg" alt="Group Image">
											</div>
											<h5 class="text-truncate">Rule Breakers</h5>
											<div class="stacked-images">
												<img src="img/user21.png" alt="Group Image">
												<img src="img/user20.png" alt="Group Image">
												<img src="img/user15.png" alt="Group Image">
												<img src="img/user16.png" alt="Group Image">
												<img src="img/user17.png" alt="Group Image">
												<img src="img/user18.png" alt="Group Image">
												<img src="img/user13.png" alt="Group Image">
												<img src="img/user22.png" alt="Group Image">
												<span class="plus">+7</span>
											</div>
											<div class="group-chat-actions">
												<button class="edit-group" data-toggle="modal" data-target="#editGroup">
													<img  src="img/edit.svg" alt="Edit Group" />
												</button>
												<button class="delete-group">
													<img src="img/delete.svg" alt="Delete Group" />
												</button>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="group-avatar">
												<img src="img/group3.svg" alt="Group Image">
											</div>
											<h5 class="text-truncate">Creative Minds</h5>
											<div class="stacked-images">
												<img src="img/user7.png" alt="Group Image">
												<img src="img/user2.png" alt="Group Image">
												<img src="img/user5.png" alt="Group Image">
												<img src="img/user12.png" alt="Group Image">
												<img src="img/user19.png" alt="Group Image">
												<img src="img/user6.png" alt="Group Image">
											</div>
											<div class="group-chat-actions">
												<button class="edit-group" data-toggle="modal" data-target="#editGroup">
													<img  src="img/edit.svg" alt="Edit Group" />
												</button>
												<button class="delete-group">
													<img src="img/delete.svg" alt="Delete Group" />
												</button>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="group-avatar">
												<img src="img/group7.svg" alt="Group Image">
											</div>
											<h5 class="text-truncate">Avengers</h5>
											<div class="stacked-images">
												<img src="img/user14.png" alt="Group Image">
												<img src="img/user18.png" alt="Group Image">
												<img src="img/user7.png" alt="Group Image">
												<img src="img/user9.png" alt="Group Image">
												<img src="img/user20.png" alt="Group Image">
												<img src="img/user19.png" alt="Group Image">
											</div>
											<div class="group-chat-actions">
												<button class="edit-group" data-toggle="modal" data-target="#editGroup">
													<img  src="img/edit.svg" alt="Edit Group" />
												</button>
												<button class="delete-group">
													<img src="img/delete.svg" alt="Delete Group" />
												</button>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<!-- Group chat list end -->

						</div>

						<!-- Settings Tab -->
						<div class="tab-pane fade" id="tab-settings" role="tabpanel" aria-labelledby="settings-tab">

							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Settings
							</div>
							<!-- Tab content header end -->

							<!-- Account settings start -->
							<div class="account-settings">

								<!-- Account Settings Container Start -->
								<div class="account-settings-container">

									<div class="accordion" id="settingsAccordion">
										<div class="account-settings-block">
											<div class="account-settings-header" id="generalInfo">
												<button class="btn" type="button" data-toggle="collapse" data-target="#generalInfoCollapse" aria-expanded="true" aria-controls="generalInfoCollapse">
													General Info
													<div class="toggle-arrow"></div>
												</button>
											</div>
											<div id="generalInfoCollapse" class="collapse show" aria-labelledby="generalInfo" data-parent="#settingsAccordion">

												<div class="account-settings-body">

													<div class="upload-profile">

														<div class="upload-profile-image">
															<img src="img/user2.png" alt="Profile Image">
														</div>
														<div class="field-wrapper">
															<div class="custom-file">
																<input type="file" class="custom-file-input" id="uploadProfile">
																<label class="custom-file-label" for="uploadProfile">Choose file</label>
															</div>
														</div>

													</div>

													<div class="field-wrapper">
														<input type="text" value="Jeivxezer Lopexz" />
														<div class="field-placeholder">Full Name</div>
													</div>

													<div class="field-wrapper">
														<input type="email" value="jeivxezer-lopexz@email.com" />
														<div class="field-placeholder">Email</div>
													</div>

													<div class="field-wrapper m-0">
														<input type="text" value="0 0000 00000" />
														<div class="field-placeholder">Contact</div>
													</div>
												</div>

											</div>
										</div>
										<div class="account-settings-block">
											<div class="account-settings-header" id="changePwd">
												<button class="btn collapsed" type="button" data-toggle="collapse" data-target="#changePwdCollapse" aria-expanded="false" aria-controls="changePwdCollapse">
													Change Password
													<div class="toggle-arrow"></div>
												</button>
											</div>
											<div id="changePwdCollapse" class="collapse" aria-labelledby="changePwd" data-parent="#settingsAccordion">

												<div class="account-settings-body">
													<div class="field-wrapper">
														<input type="text" value="" />
														<div class="field-placeholder">Current Password</div>
													</div>
													<div class="field-wrapper">
														<input type="password" value="" />
														<div class="field-placeholder">New Password</div>
													</div>
													<div class="field-wrapper m-0">
														<input type="password" value="" />
														<div class="field-placeholder">Confirm Password</div>
													</div>

													<div class="mt-3">
														<button class="btn btn-primary btn-block">Change Password</button>
													</div>

												</div>

											</div>
										</div>
										<div class="account-settings-block">
											<div class="account-settings-header" id="notifications">
												<button class="btn collapsed" type="button" data-toggle="collapse" data-target="#notificationsCollapse" aria-expanded="false" aria-controls="notificationsCollapse">
													Notifications
													<div class="toggle-arrow"></div>
												</button>
											</div>
											<div id="notificationsCollapse" class="collapse" aria-labelledby="notifications" data-parent="#settingsAccordion">
												<div class="account-settings-body">

													<div class="list-group m-0">
														<div class="list-group-item">
															<div class="custom-control custom-switch">
																<div class="custom-switch-label">
																	Play sound on new messages
																</div>
																<div>
																	<input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
																	<label class="custom-control-label" for="customSwitch1"></label>
																</div>
															</div>
														</div>
														<div class="list-group-item">
															<div class="custom-control custom-switch">
																<div class="custom-switch-label">
																	Send desktop notifications
																</div>
																<div>
																	<input type="checkbox" class="custom-control-input" id="customSwitch2">
																	<label class="custom-control-label" for="customSwitch2"></label>
																</div>
															</div>
														</div>
														<div class="list-group-item">
															<div class="custom-control custom-switch">
																<div class="custom-switch-label">
																	Show chat notifications
																</div>
																<div>
																	<input type="checkbox" class="custom-control-input" id="customSwitch3">
																	<label class="custom-control-label" for="customSwitch3"></label>
																</div>
															</div>
														</div>
														<div class="list-group-item">
															<div class="custom-control custom-switch">
																<div class="custom-switch-label">
																	Last seen
																</div>
																<div>
																	<input type="checkbox" class="custom-control-input" id="customSwitch4">
																	<label class="custom-control-label" for="customSwitch4"></label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
								<!-- Account Settings Container End -->

								<div class="save-btn-block">
									<button class="btn btn-primary btn-block">Save Changes</button>
								</div>

							</div>
							<!-- Account settings end -->

						</div>

					</div>
					<!-- Tabs Content End -->

				</div>
				<!-- Sidebar content end -->

			</nav>
			<!-- Sidebar wrapper end -->

			<!-- *************
				************ Main container start *************
			************* -->
			<div class="main-container">

				<!-- Content wrapper start -->
        <?php if(isset($_GET['id'])){ ?>
          <div class="chat-content-wrapper" style="">

					<!-- Active User Chatting Start -->
					<div class="active-user-chatting">

						<div class="active-user-info">
							<div class="toggle-sidebar" id="toggle-sidebar">
								<span class="toggle-icon"></span>
							</div>
							<div class="bg-chat-avatar red">MK</div>
							<div class="avatar-info">
								<h5 id="chatname">abbey</h5>
								<div class="typing">Typing ...</div>
							</div>
						</div>
						<div class="chat-actions">
							<a href="#" data-toggle="modal" data-target="#videoCall">
								<img src="img/icon-video-call.svg" alt="Video Call">
							</a>
							<a href="#" data-toggle="modal" data-target="#audioCall">
								<img src="img/icon-call.svg" alt="Call">
							</a>
						</div>

					</div>
					<!-- Active User Chatting End -->

					<!-- Chat Container Start -->
					<div class="chat-container" id="scroll">
						<div class="chatContainerScroll" tabindex="0">
							<ul id="chat-display" class="chat-box">
								<!-- <li class='chat-left'>
                  <div class="" id="todo_board_right">
									<div class='chat-avatar'>
										<img src="img/user21.png" alt="Quick Chat Admin" />
										<div class='chat-name'><h5 id="chatname"></h5>Kyle</div>
									</div>
									<div class="chat-text-wrapper">
										<div class='chat-text' ifd="todo_board">
											<p value="hey">heyfl kjjjf</p>
                    </div>
											<div class='chat-hour read'>08:55 <span>&#10003;</span></div>
										</div>
									</div>
								</li> -->
								<!-- <li class='chat-right'>
                  <div class="" id="todo_board_left">
									<div class="chat-text-wrapper">
										<div class='chat-text'>
											<p value=""></p>
                       </div>
											<div class='chat-hour read'>08:56 <span>&#10003;</span></div>
										</div>
									<div class='chat-avatar'>
										<img src="img/user24.png" alt="Quick Chat Admin" />
										<div class='chat-name'>Amy</div>
									</div>
                </div>
								</li> -->
								<!-- <li class="divider">Feb 18, 2021</li> -->
							</ul>
						</div>
					</div>
					<!-- Chat Container End -->

					<!-- Chat form start -->
            <div class="chat-form">
						<div class="form-group" id="text">
							<textarea class="form-control" placeholder="Type your message here..." id="abbeytext" value=""></textarea>
						</div>
						<div class="chat-form-actions">
							<a href="#" class="action-icon">
								<img src="img/emoji.svg" alt="Emoji">
								<div class="action-icon-popup">
									<div class="emoji-list">
                      <span onclick="load(this)">&#128522;</span>
										<span onclick="load(this)">&#128525;</span>
										<span onclick="load(this)">&#128514;</span>
										<span onclick="load(this)">&#128557;</span>
										<span onclick="load(this)">&#128530;</span>
										<span onclick="load(this)">&#128536;</span>
										<span onclick="load(this)">&#128553;</span>
										<!-- <span>&#128532;</span>
										<span>&#128527;</span>
										<span>&#128513;</span>
										<span>&#128521;</span>
										<span>&#128524;</span>
										<span>&#128563;</span>
										<span>&#128526;</span>
										<span>&#128546;</span>
										<span>&#128564;</span>
										<span>&#128516;</span>
										<span>&#128529;</span>
										<span>&#128533;</span>
										<span>&#128523;</span>
										<span>&#128528;</span>
										<span>&#128554;</span>
										<span>&#128545;</span>
										<span>&#128074;</span>
										<span>&#128515;</span>
										<span>&#128548;</span>
										<span>&#128567;</span>
										<span>&#128538;</span>
										<span>&#128516;</span>
										<span>&#128543;</span>
										<span>&#128537;</span>
										<span>&#128077;</span>
										<span>&#128078;</span>
										<span>&#128076;</span>
										<span>&#128591;</span> -->
									</div>
								</div>
							</a>
							<a href="#" class="action-icon" data-toggle="modal" data-target="#attachFile">
								<img src="img/attach.svg" alt="Attachment">
								<span class="action-icon-tooltip">Attach</span>
							</a>
						</div>
						<button class="btn btn-primary" id="abbeysubmit">
							<img src="img/send1.svg" alt="Send">
						</button>
          </div>
					<!-- Chat form end -->

				</div>
      <?php }else { ?>


  				<!-- Empty chat screen start -->
  				<div class="empty-chat-screen filter-item 0">

  					<!-- Option to display logged in user avatar -->
  					<!--
  						<img src="img/user2.png" class="my-avatar" alt="My Avatar">
  						<h5>Hey, <span>Katherine</span></h5>
  						<h6>Welcome to Quick Chat App</h6>
  						<p>Please select a chat to start messaging.</p>
  					-->

  					<!-- Display Image -->
  					<img src="img/empty-chat-display.svg" class="empty-chat-display" alt="My Avatar">
  					<p>Please select a chat to start messaging.</p>

  					<a href="#" class="btn btn-primary lets-chat-mobile-view">Lets Chat</a>
  				</div>
  				<!-- Empty chat screen end -->
<?php }?>
				<!-- Content wrapper end -->

				<!-- Audio Call Modal -->
				<div class="modal fade" id="audioCall" tabindex="-1" role="dialog" aria-labelledby="audioCallLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<div class="modal-body">
								<div class="call-container">
									<div class="current-user">
										<img src="img/user21.png" alt="Avatar" >
									</div>
									<h5 class="calling-user-name">
										Amy Marrison <span class="calling">Calling...</span>
									</h5>
									<div class="calling-btns">
										<button class="btn btn-danger" data-dismiss="modal">
											<img src="img/icon-close.svg" alt="Reject Call">
										</button>
										<button class="btn btn-success">
											<img src="img/icon-calling.svg" alt="Calling">
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Video Call Modal -->
				<div class="modal fade" id="videoCall" tabindex="-1" role="dialog" aria-labelledby="videoCallLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<div class="modal-body">
								<div class="call-container">
									<div class="current-user">
										<img src="img/user15.png" alt="Avatar" >
									</div>
									<h5 class="calling-user-name">
										Amy Marrison <span class="calling">Calling...</span>
									</h5>
									<div class="calling-btns">
										<button class="btn btn-danger" data-dismiss="modal">
											<img src="img/icon-close.svg" alt="Reject Call">
										</button>
										<button class="btn btn-success">
											<img src="img/icon-video-call-white.svg" alt="Video Call">
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Create Group Modal -->
				<div class="modal fade" id="createGroup" tabindex="-1" role="dialog" aria-labelledby="createGroupLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Create Group</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<!-- Upload profile start -->
								<div class="upload-profile">
									<div class="upload-profile-image">
										<img src="img/group2.svg" alt="Group Image">
									</div>
									<div class="field-wrapper">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="uploadProfile">
											<label class="custom-file-label" for="uploadProfile">Group image</label>
										</div>
									</div>
								</div>
								<!-- Upload profile end -->

								<div class="field-wrapper">
									<input type="text" placeholder="Enter Group Name">
									<div class="field-placeholder">Group Name</div>
								</div>

								<div class="field-wrapper-group">
									<div class="field-wrapper">
										<input type="email" placeholder="Enter Email ID">
										<div class="field-placeholder">Add User</div>
									</div>
									<button class="btn btn-secondary">Add</button>
								</div>

								<div class="stacked-users-group">
									<div class="stacked-user">
										<img src="img/user21.png" alt="User" />
										<span class="delete-user">
											<img src="img/close.svg" alt="Remove User" />
										</span>
									</div>
									<div class="stacked-user">
										<img src="img/user15.png" alt="User" />
										<span class="delete-user">
											<img src="img/close.svg" alt="Remove User" />
										</span>
									</div>
									<div class="stacked-user">
										<img src="img/user6.png" alt="User" />
										<span class="delete-user">
											<img src="img/close.svg" alt="Remove User" />
										</span>
									</div>
									<div class="stacked-user">
										<img src="img/user24.png" alt="User" />
										<span class="delete-user">
											<img src="img/close.svg" alt="Remove User" />
										</span>
									</div>
									<div class="stacked-user">
										<img src="img/user13.png" alt="User" />
										<span class="delete-user">
											<img src="img/close.svg" alt="Remove User" />
										</span>
									</div>
								</div>

								<div class="mt-3">
									<button class="btn btn-primary btn-block">Create Group</button>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Create Group Modal -->
				<div class="modal fade" id="editGroup" tabindex="-1" role="dialog" aria-labelledby="editGroupLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Group</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<!-- Upload profile start -->
								<div class="upload-profile">
									<div class="upload-profile-image">
										<img src="img/group2.svg" alt="Group Image">
									</div>
									<div class="field-wrapper">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="uploadProfile">
											<label class="custom-file-label" for="uploadProfile">Group image</label>
										</div>
									</div>
								</div>
								<!-- Upload profile end -->

								<div class="field-wrapper">
									<input type="text" value="Avengers">
									<div class="field-placeholder">Edit Group Name</div>
								</div>

								<div class="field-wrapper-group">
									<div class="field-wrapper">
										<input type="email" placeholder="Enter Email ID">
										<div class="field-placeholder">Add User</div>
									</div>
									<button class="btn btn-secondary">Add</button>
								</div>

								<div class="stacked-users-group">
									<div class="stacked-user">
										<img src="img/user2.png" alt="User" />
										<span class="delete-user">
											<img src="img/close.svg" alt="Remove User" />
										</span>
									</div>
									<div class="stacked-user">
										<img src="img/user5.png" alt="User" />
										<span class="delete-user">
											<img src="img/close.svg" alt="Remove User" />
										</span>
									</div>
									<div class="stacked-user">
										<img src="img/user6.png" alt="User" />
										<span class="delete-user">
											<img src="img/close.svg" alt="Remove User" />
										</span>
									</div>
									<div class="stacked-user">
										<img src="img/user7.png" alt="User" />
										<span class="delete-user">
											<img src="img/close.svg" alt="Remove User" />
										</span>
									</div>
									<div class="stacked-user">
										<img src="img/user8.png" alt="User" />
										<span class="delete-user">
											<img src="img/close.svg" alt="Remove User" />
										</span>
									</div>
								</div>

								<div class="mt-3">
									<button class="btn btn-primary btn-block">Update Group</button>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Attach File Modal -->
				<div class="modal fade" id="attachFile" tabindex="-1" role="dialog" aria-labelledby="attachFileLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Attach File</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<!-- Attach file start -->
								<div class="upload-profile">
									<div class="upload-profile-image">
										<img src="img/group2.svg" alt="Attached Image">
									</div>
									<div class="field-wrapper">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="attachImage">
											<label class="custom-file-label" for="attachImage">Attach File</label>
										</div>
									</div>
								</div>
								<!-- Attach file end -->

								<div class="mt-3 text-right">
									<button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<button class="btn btn-primary">Upload</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- *************
				************ Main container end *************
			************* -->

		</div>
		<!-- Page wrapper end -->

		<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Slimscroll JS -->
		<script src="vendor/slimscroll/slimscroll.min.js"></script>
    <script src="vendor/slimscroll/custom-scrollbar.js"></script>
		<script src="js/abbey.js"></script>


		<!-- Main Js Required -->
		<script src="js/main.js"></script>

	</body>

<!-- Mirrored from bootstrap.gallery/ichat/dark-version/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Sep 2022 10:06:42 GMT -->
</html>
<script type="text/javascript">
</script>
