                <!-- page content -->
                <div class="dev-page-content">                    
                    <!-- page content container -->
                    <div class="container">
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="wrapper">
                                    <div class="alert alert-info">
                                        <b>Users Manager</b> teridri dari tiga sub menu, Administrators, Workers, dan Companies. Disini anda dapat memanage ketiga komponen tersebut.
                                    </div>
                                    <div class="alert alert-info">
                                        <b>Content Manager</b> terdiri dari 4 sub menu, content sets (konten yang digunakan user dalam penginputan data), F.A.Q (Frequently Asked Question untuk memudahkan user dalam mendapatkan pemahamaman), Home Content (Slider dan contact yang ditampilkan), serta Hak dan Kewajiban yang ditampilkan sebagai prasyarat yang harus dibaca ketika melamar pekerjaan.
                                    </div>
                                    <div class="alert alert-info">
                                        Pada <b>Loker Manager (Lowongan Kerja)</b> dapat mengedit, menghapus, dan menambahkan loker baru (sebagai perusahaan tertentu dalam database perusahaan).
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="wrapper padding-bottom-0">
                                    <div class="dev-table">    
                                        <div class="row">
                                            <div class="dev-col col-md-6">                                    
                                                <div class="dev-widget dev-widget-transparent dev-widget-success">
                                                    <h2>Total Workers</h2>
                                                    <p>This is your total workers till now.</p>                                        
                                                    <div class="dev-stat"><span class="counter"><?php echo $worker_count;?></span> Workers regristered</div>                                                                                
                                                    <div class="progress progress-bar-xs">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                    </div>
                                                    <a href="#" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>
                                                </div>
                                            </div>
                                            <div class="dev-col col-md-6">                                    
                                                <div class="dev-widget dev-widget-transparent dev-widget-danger">
                                                    <h2>Total Companies</h2>
                                                    <p>Companies contributing jobs on Sambilkerja.</p>
                                                    <div class="dev-stat"><span class="counter"><?php echo $comp_count;?></span> Companies</div>                                                                                
                                                    <div class="progress progress-bar-xs">
                                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                    </div>                                        
                                                    <a href="#" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="dev-col col-md-6">                                    
                                                <div class="dev-widget dev-widget-transparent dev-widget-danger">
                                                    <h2>Total Jobs</h2>
                                                    <p>The total jobs companies have opened.</p>
                                                    <div class="dev-stat"><span class="counter"><?php echo $job_count;?></span> Jobs listed</div>                                                                                
                                                    <div class="progress progress-bar-xs">
                                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                    </div>                                        
                                                    <a href="#" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>                                        
                                                </div>
                                            </div>
                                            <div class="dev-col col-md-6">                                    
                                                <div class="dev-widget dev-widget-transparent dev-widget-danger">
                                                    <h2>Total Administrators</h2>
                                                    <p>The total admins you prepare.</p>
                                                    <div class="dev-stat"><span class="counter"><?php echo $adm_count;?></span> Administrators</div>                                                                                
                                                    <div class="progress progress-bar-xs">
                                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                    </div>                                        
                                                    <a href="#" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="wrapper wrapper-white" style="overflow-y:auto;height:500px;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="page-subtitle">
                                                <h3>Database Records</h3>
                                            </div>
                                            <ul class="timeline-simple">
                                                <li class="primary">
                                                    <div class="timeline-simple-wrap">                                                
                                                        The standard Lorem Ipsum passage, used since the 1500s
                                                        <span class="timeline-simple-date">12 min ago</span>
                                                    </div>
                                                </li>                                        
                                                <li class="info">
                                                    <div class="timeline-simple-wrap">                                                
                                                        Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                                                        <span class="timeline-simple-date">2h ago</span>
                                                    </div>
                                                </li>
                                                <li class="success">
                                                    <div class="timeline-simple-wrap">                                                
                                                        1914 translation by H. Rackham
                                                        <span class="timeline-simple-date">15h ago</span>
                                                    </div>
                                                </li>
                                                <li class="warning">
                                                    <div class="timeline-simple-wrap">                                                
                                                        Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                                                        <span class="timeline-simple-date">19h ago</span>
                                                    </div>
                                                </li>
                                                <li class="info">
                                                    <div class="timeline-simple-wrap">                                                
                                                        Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                                                        <span class="timeline-simple-date">2h ago</span>
                                                    </div>
                                                </li>
                                                <li class="success">
                                                    <div class="timeline-simple-wrap">                                                
                                                        1914 translation by H. Rackham
                                                        <span class="timeline-simple-date">15h ago</span>
                                                    </div>
                                                </li>
                                                <li class="warning">
                                                    <div class="timeline-simple-wrap">                                                
                                                        Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                                                        <span class="timeline-simple-date">19h ago</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>                                
                                    </div>
                                </div> -->

                                






