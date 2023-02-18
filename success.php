<?php
include './db/index.php';

session_start();


if(isset( $_SESSION['loggedIn'])){

  
}
else{
    header('location:index');
}
?>
<html lang="en">
  <head>
    <!-- essential -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="main.css" />

    <script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

  </head>
  <body>
    <div class="drawer drawer-mobile">
      <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
      <div class="drawer-content flex justify-center lg:justify-start">
        <div class="lg:w-[60vw] max-w-screen-lg lg:pt-4 lg:p-4">
          <div class="navbar bg-base-100 lg:hidden sticky top-0 w-full z-50">
            <div class="flex-none">
              <label
                for="my-drawer-2"
                class="btn btn-square btn-ghost lg:hidden"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  class="inline-block w-5 h-5 stroke-current"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                  ></path>
                </svg>
              </label>
            </div>
            <div class="flex-1">
              <a class="btn btn-ghost normal-case text-xl" href="./">Sarissa Blog</a>
            </div>
            <div class="flex-none">
              <button
                data-set-theme="winter"
                class="btn btn-sm btn-ghost btn-square"
                data-act-class="btn-active"
              >
                <svg
                  class="inline-block w-4 h-4 fill-current"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 512 512"
                >
                  <title>ionicons-v5-q</title>
                  <path
                    d="M256,118a22,22,0,0,1-22-22V48a22,22,0,0,1,44,0V96A22,22,0,0,1,256,118Z"
                  />
                  <path
                    d="M256,486a22,22,0,0,1-22-22V416a22,22,0,0,1,44,0v48A22,22,0,0,1,256,486Z"
                  />
                  <path
                    d="M369.14,164.86a22,22,0,0,1-15.56-37.55l33.94-33.94a22,22,0,0,1,31.11,31.11l-33.94,33.94A21.93,21.93,0,0,1,369.14,164.86Z"
                  />
                  <path
                    d="M108.92,425.08a22,22,0,0,1-15.55-37.56l33.94-33.94a22,22,0,1,1,31.11,31.11l-33.94,33.94A21.94,21.94,0,0,1,108.92,425.08Z"
                  />
                  <path
                    d="M464,278H416a22,22,0,0,1,0-44h48a22,22,0,0,1,0,44Z"
                  />
                  <path d="M96,278H48a22,22,0,0,1,0-44H96a22,22,0,0,1,0,44Z" />
                  <path
                    d="M403.08,425.08a21.94,21.94,0,0,1-15.56-6.45l-33.94-33.94a22,22,0,0,1,31.11-31.11l33.94,33.94a22,22,0,0,1-15.55,37.56Z"
                  />
                  <path
                    d="M142.86,164.86a21.89,21.89,0,0,1-15.55-6.44L93.37,124.48a22,22,0,0,1,31.11-31.11l33.94,33.94a22,22,0,0,1-15.56,37.55Z"
                  />
                  <path
                    d="M256,358A102,102,0,1,1,358,256,102.12,102.12,0,0,1,256,358Z"
                  />
                </svg>
              </button>
              <button
                data-set-theme="garden"
                class="btn btn-sm btn-ghost btn-square"
                data-act-class="btn-active"
              >
                <svg
                  class="inline-block w-4 h-4 fill-current"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                  />
                </svg>
              </button>
              <button
                data-set-theme="dark"
                class="btn btn-sm btn-ghost btn-square"
                data-act-class="btn-active"
              >
                <svg
                  class="inline-block w-4 h-4 fill-current"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 512 512"
                >
                  <title>ionicons-v5-j</title>
                  <path
                    d="M152.62,126.77c0-33,4.85-66.35,17.23-94.77C87.54,67.83,32,151.89,32,247.38,32,375.85,136.15,480,264.62,480c95.49,0,179.55-55.54,215.38-137.85-28.42,12.38-61.8,17.23-94.77,17.23C256.76,359.38,152.62,255.24,152.62,126.77Z"
                  />
                </svg>
              </button>
            </div>
          </div>
          <div class="flex-1 p-3 md:py-[35]">
            <div class="space-y-2 md:space-y-6">
               <?php 
                 $userEmail =  $_SESSION['email'];
                  $query = "select * from todo  where created_by ='$userEmail' order by id desc";
                  $query_run = mysqli_query($connection,$query);

                  if(mysqli_num_rows($query_run) > 0){
                   

                    while($data = mysqli_fetch_array($query_run)){
                      $id = $data['id'];
                    ?>
                   
                   <div class="card card-side bg-base-200 shadow-xl">
                     <!-- <figure>
                       <img
                         src="https://api.lorem.space/image/movie?w=200&h=280"
                         alt="Movie"
                       />
                     </figure> -->
                    
                        <div class="card-body">
                         <h2 class="card-title"><?php echo $data['title'] ?></h2>
                         <div class="justify-start">
                           <a href="edit?id=<?php echo $id ?>" class="btn btn-xs btn-primary">Edit</a>
                           <a  class="btn btn-xs danger">Delete</a>
                          
                         </div>
                         <p>
                          <?php echo $data['task'] ?>
                         </p>
                   <?php
                
                
 
$date = $data['created_at'];




                   ?>
                         <p>created at : <?php echo $date  ?></p>
                       </div>
                   </div>
                   
<!-- Main modal -->
<div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Static modal
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="staticModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="staticModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
        </div>
    </div>
</div>
                   
                    <?php
                    }
                  }
                  else{
                    echo '<div class="text-3xl text-center font-bold">No todo yet</div>';

                  }
                  
                  ?>

              <!-- <div class="card card-side bg-base-200 shadow-xl">
                <div class="card-body">
                  <h2 class="card-title">
                    Fringilla est ullamcorper eget nulla facilisi etiam dignissim.
                  </h2>
                  <div class="justify-start">
                    <button class="btn btn-xs btn-accent">Article</button>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Rhoncus dolor purus non enim. Purus viverra accumsan in nisl.
                    Aliquam faucibus purus in massa. In vitae turpis massa sed
                    elementum tempus egestas. Nisl purus in mollis nunc sed.
                    Ullamcorper morbi tincidunt ornare massa eget. Enim nulla
                    aliquet porttitor lacus luctus accumsan. Id neque aliquam
                    vestibulum morbi blandit cursus. Pellentesque eu tincidunt
                    tortor aliquam nulla facilisi cras. Sed augue lacus viverra
                    vitae.
                  </p>
                </div>
              </div> -->
              
            
      
            </div>
            <!-- <div class="divider"></div>
            <p class="text-sm pl-4">© 1967 - 2022 Sarissa Blog</p>
            <p class="text-xs pl-4">
              Sarissa theme desing by
              <a class="link" href="https://github.com/iozcelik">iozcelik</a>
            </p> -->
          </div>

        </div>
      </div>
      <div class="drawer-side">
        <label for="my-drawer-2" class="drawer-overlay"></label>
        <div class="overflow-y-auto flex lg:justify-end w-fit lg:w-[40vw]">
          <!-- Sidebar content here -->
          <div class="w-fit p-3 lg:m-6 bg-base-100">
            <!-- avatar start -->
            <!-- <div class="avatar w-60">
              <div class="w-16 lg:w-32 rounded-full mx-auto">
                <img src="https://api.lorem.space/image/face?hash=92310" />
              </div>
            </div> -->
            <!-- avatar end -->
           
            <h1 class="text-2xl p-2 pl-4"><?php echo $_SESSION['name'] ?></h1>
                        <p class="text-sm pl-4">Responsive Blog Template</p>
            <div class="flex gap-1 justify-center pt-4">
              <a class="btn btn-sm btn-ghost btn-square">
                <svg
                  class="inline-block w-4 h-4 fill-current"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path
                    d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"
                  />
                </svg>
              </a>
              <a class="btn btn-sm btn-ghost btn-square">
                <svg
                  class="inline-block w-4 h-4 fill-current"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path
                    d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"
                  />
                </svg>
              </a>
              <a
                class="btn btn-sm btn-ghost btn-square"
              >
                <svg
                  class="inline-block w-4 h-4 fill-current"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path
                    d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"
                  />
                  <rect x="2" y="9" width="4" height="12" />
                  <circle cx="4" cy="4" r="2" />
                </svg>
              </a>
              <a
              class="btn btn-sm btn-ghost btn-square"
            >
            <svg class="inline-block w-4 h-4 fill-current"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22" /></svg>
            </a>
            </div>
            <div class="divider"></div>
            <!-- menu start -->
            <div class="pt-4">
              <ul class="menu bg-base-100 rounded-box">
                <li>
                  <a href="./">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                      />
                    </svg>
                    Home
                  </a>
                </li>
                <li>
                  <a href="./about.html">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                      />
                    </svg>
                    About
                  </a>
                </li>
                <li>
                  <a href="add-todo">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"
                      />
                    </svg>
                    add TODO
                  </a>
                </li>
                <li>
                  <a href="./search.html">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                      />
                    </svg>
                    Search
                  </a>
                </li>
                <li>
                  <a href="logout">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
                      />
                    </svg>
                    Logout
                  </a>
                </li>
                <div class="divider"></div>
                <li class="hidden lg:block">
                  <div class="flex gap-1 justify-center">
                    <button
                      data-set-theme="winter"
                      class="btn btn-sm btn-ghost btn-square"
                      data-act-class="btn-active"
                    >
                      <svg
                        class="inline-block w-4 h-4 fill-current"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                      >
                        <title>ionicons-v5-q</title>
                        <path
                          d="M256,118a22,22,0,0,1-22-22V48a22,22,0,0,1,44,0V96A22,22,0,0,1,256,118Z"
                        />
                        <path
                          d="M256,486a22,22,0,0,1-22-22V416a22,22,0,0,1,44,0v48A22,22,0,0,1,256,486Z"
                        />
                        <path
                          d="M369.14,164.86a22,22,0,0,1-15.56-37.55l33.94-33.94a22,22,0,0,1,31.11,31.11l-33.94,33.94A21.93,21.93,0,0,1,369.14,164.86Z"
                        />
                        <path
                          d="M108.92,425.08a22,22,0,0,1-15.55-37.56l33.94-33.94a22,22,0,1,1,31.11,31.11l-33.94,33.94A21.94,21.94,0,0,1,108.92,425.08Z"
                        />
                        <path
                          d="M464,278H416a22,22,0,0,1,0-44h48a22,22,0,0,1,0,44Z"
                        />
                        <path
                          d="M96,278H48a22,22,0,0,1,0-44H96a22,22,0,0,1,0,44Z"
                        />
                        <path
                          d="M403.08,425.08a21.94,21.94,0,0,1-15.56-6.45l-33.94-33.94a22,22,0,0,1,31.11-31.11l33.94,33.94a22,22,0,0,1-15.55,37.56Z"
                        />
                        <path
                          d="M142.86,164.86a21.89,21.89,0,0,1-15.55-6.44L93.37,124.48a22,22,0,0,1,31.11-31.11l33.94,33.94a22,22,0,0,1-15.56,37.55Z"
                        />
                        <path
                          d="M256,358A102,102,0,1,1,358,256,102.12,102.12,0,0,1,256,358Z"
                        />
                      </svg>
                    </button>
                    <button
                      data-set-theme="garden"
                      class="btn btn-sm btn-ghost btn-square"
                      data-act-class="btn-active"
                    >
                      <svg
                        class="inline-block w-4 h-4 fill-current"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                        />
                      </svg>
                    </button>
                    <button
                      data-set-theme="dark"
                      class="btn btn-sm btn-ghost btn-square"
                      data-act-class="btn-active"
                    >
                      <svg
                        class="inline-block w-4 h-4 fill-current"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                      >
                        <title>ionicons-v5-j</title>
                        <path
                          d="M152.62,126.77c0-33,4.85-66.35,17.23-94.77C87.54,67.83,32,151.89,32,247.38,32,375.85,136.15,480,264.62,480c95.49,0,179.55-55.54,215.38-137.85-28.42,12.38-61.8,17.23-94.77,17.23C256.76,359.38,152.62,255.24,152.62,126.77Z"
                        />
                      </svg>
                    </button>
                  </div>
                </li>
              </ul>
            </div>
            <!-- menu end -->
          </div>
        </div>
      </div>
    </div>

   
  </body>
</html>