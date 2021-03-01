import { ManagementAnnoucementComponent } from './management-annoucement/management-annoucement.component';
import { DatatableComponent } from './datatable/datatable.component';
import { Routes } from '@angular/router';
import { DashboardComponent } from './dashboard/dashboard.component';
import { ManagementAuditComponent } from './management-audit/management-audit.component';
import { ManagementUserComponent } from './management-user/management-user.component';
import { ReportComponent } from './report/report.component';
import { ManagementFaqComponent } from './management-faq/management-faq.component';
import { ManagementDisclaimerComponent } from './management-disclaimer/management-disclaimer.component';
import { ManagementUserguideComponent } from './management-userguide/management-userguide.component';


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
                        path: 'disclaimer',
                        component: ManagementDisclaimerComponent
                    },
                ]
            },
            {
                path: 'report',
                component: ReportComponent
            },
            {
                path: 'tabledata',
                component: DatatableComponent
            },
        ]
    }
]