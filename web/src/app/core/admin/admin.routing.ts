import { ManagementElementmetadataComponent } from './management-elementmetadata/management-elementmetadata.component';
import { ManagementNewappComponent } from './management-newapp/management-newapp.component';
import { ManagementAppstatusComponent } from './management-appstatus/management-appstatus.component';
import { ManagementProcessdataComponent } from './management-processdata/management-processdata.component';
import { ManagementDataComponent } from './management-data/management-data.component';
import { ManagementAnnoucementComponent } from './management-annoucement/management-annoucement.component';
import { DatatableComponent } from './datatable/datatable.component';
import { Routes } from '@angular/router';
import { DashboardComponent } from './dashboard/dashboard.component';
import { ManagementAuditComponent } from './management-audit/management-audit.component';
import { ManagementUserComponent } from './management-user/management-user.component';
import { ReportComponent } from './report/report.component';
import { ManagementFaqComponent } from './management-faq/management-faq.component';
import { ManagementUserguideComponent } from './management-userguide/management-userguide.component';
import { ProfileComponent } from './profile/profile.component';
import { FeedbackComponent } from './feedback/feedback.component';


export const AdminRoutes: Routes = [
    {
        path: '',
        children: [
            {
                path: 'dashboard',
                component: DashboardComponent
            },
            {
                path: 'management',
                children: [
                    {
                        path: 'audit-trails',
                        component: ManagementAuditComponent
                    },
                    {
                        path: 'user',
                        component: ManagementUserComponent
                    },
                    {
                        path: 'faq',
                        component: ManagementFaqComponent
                    },
                    {
                        path: 'annoucement',
                        component: ManagementAnnoucementComponent
                    },
                    {
                        path: 'userguide',
                        component: ManagementUserguideComponent
                    },
                    {
                        path: 'tabledata',
                        component: DatatableComponent
                    },
                    {
                        path: 'dataasas',
                        component: ManagementDataComponent
                    },
                    {
                        path: 'dataprocess',
                        component: ManagementProcessdataComponent
                    },
                    {
                        path: 'applicationstatus',
                        component: ManagementAppstatusComponent
                    },
                    {
                        path: 'newapplication',
                        component: ManagementNewappComponent
                    },
                    {
                        path: 'update-element',
                        component: ManagementElementmetadataComponent
                    }

                ]
            },
            {
                path: 'report',
                component: ReportComponent
            },
            {
                path: 'profile',
                component: ProfileComponent
            },
            {
                path: 'feedback',
                component: FeedbackComponent
            },
        ]
    }
]