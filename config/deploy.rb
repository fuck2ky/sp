#require "bundler/capistrano"
require 'railsless-deploy'

set :deploy_via, :remote_cache
set :application, "sanpellegrino.cn"
server "jh_web3", :web, :app, :db, primary: true
set :repository,  "git://github.com/gxbsst/sp.git"
set :user, "deployer"
set :deploy_to, "/home/#{user}/apps/#{application}"

set :scm, :git
set :use_sudo, false

set :branch, "master"

default_run_options[:pty] = true
ssh_options[:forward_agent] = true

namespace :deploy do

	task :setup_config, roles: :app do
		run "mkdir -p #{shared_path}/config"
		run "mkdir -p #{shared_path}/uploads"
		# run "mv #{release_path}/config.php #{shared_path}/config"
		# put File.read("config.php"), "#{shared_path}/config/config.php"
		puts "Now edit the config files in #{shared_path}."
	end

	after "deploy:setup", "deploy:setup_config"

	task :symlink_config, roles: :app do
		# run "ln -nfs #{shared_path}/config/config.php #{release_path}/config.php"

		# run "ln -nfs #{shared_path}/uploads #{release_path}/uploads"
		
		run "ln -ns #{shared_path}/uploads/ambassador_01.flv #{release_path}/ambassador_01.flv"
		run "ln -ns #{shared_path}/uploads/BulgariItalianTalents.flv #{release_path}/BulgariItalianTalents.flv"
		run "ln -ns #{shared_path}/uploads/Elliot.flv #{release_path}/Elliot.flv"
		run "ln -ns #{shared_path}/uploads/ElliottErwittandS.flv #{release_path}/ElliottErwittandS.flv"
		run "ln -ns #{shared_path}/uploads/FDL.flv #{release_path}/FDL.flv"
		run "ln -ns #{shared_path}/uploads/Missoni.flv #{release_path}/Missoni.flv"
		run "ln -ns #{shared_path}/uploads/SanpellegrinoHD.flv #{release_path}/SanpellegrinoHD.flv"
		run "ln -ns #{shared_path}/uploads/SPellergrinoTASTE01.flv #{release_path}/SPellergrinoTASTE01.flv"
		run "ln -ns #{shared_path}/uploads/SP_VideoQR_20120131_nologoprovince.flv #{release_path}/SP_VideoQR_20120131_nologoprovince.flv"
		run "ln -ns #{shared_path}/uploads/TerroirandSource02.flv #{release_path}/TerroirandSource02.flv"
		run "ln -ns #{shared_path}/uploads/VillaPanna_high.flv #{release_path}/VillaPanna_high.flv"
		run "ln -ns #{shared_path}/uploads/whds.flv #{release_path}/whds.flv"
		run "ln -ns #{shared_path}/uploads/YAM112003_Larsson_tasting_AP.flv #{release_path}/YAM112003_Larsson_tasting_AP.flv"
		run "ln -ns #{shared_path}/uploads/YAM112003_Larsson_tasting_SP..flv #{release_path}/YAM112003_Larsson_tasting_SP..flv"
		
		run "ln -ns #{shared_path}/uploads/Flvplayer.swf #{release_path}/Flvplayer.swf"
		run "ln -ns #{shared_path}/uploads/playerFMS.swf #{release_path}/playerFMS.swf"
		run "ln -ns #{shared_path}/uploads/VideoPlayerCh_v1.swf #{release_path}/VideoPlayerCh_v1.swf"

		run "ln -ns #{shared_path}/uploads/Elliot.m4v #{release_path}/Elliot.m4v"

		run "ln -ns #{shared_path}/uploads/SP_VideoQR_20120131_nologoprovince.mp4 #{release_path}/SP_VideoQR_20120131_nologoprovince.mp4"
		run "ln -ns #{shared_path}/uploads/whds.mp4 #{release_path}/whds.mp4"


    #run("chmod -R 777 #{current_path}/wp-content/uploads")
end
after "deploy:finalize_update", "deploy:symlink_config"
end