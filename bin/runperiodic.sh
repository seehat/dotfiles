#!/usr/bin/perl -w

# psuedo_anacron
# a script to run overdue periodic jobs
# at startup, working around a missing
# feature of launchd
#
# Greg Neagle, http://managingosx.wordpress.com

use strict;

system "/usr/bin/logger -t psuedo_anacron \"Starting psuedo_anacron periodic.\"";

my $logDir = "/var/log";
my $now = time;

my %periodicJobs = (
    daily => 1,
    weekly => 7,
    monthly => 30
);

while(my($job,$frequency) = each(%periodicJobs)) {
    my $needToRunJob = 1;
    if (-f ("$logDir/$job.out")) {
        my $fileModTime = (stat("$logDir/$job.out"))[9];
        my $ageInDays = ($now-$fileModTime)/(60*60*24);
        if ($ageInDays < $frequency) {
            $needToRunJob = 0;
        }
    }
    if ($needToRunJob) {
        system "/usr/bin/logger -t psuedo_anacron \"Running periodic $job because it last ran more than $frequency days ago.\"";
        system "/usr/sbin/periodic $job";
    }
}