import { DatatableComponent } from './datatable/datatable.component';
import { MetadataComponent } from './metadata/metadata.component';
import { Routes } from '@angular/router';
import { DashboardComponent } from './dashboard/dashboard.component';
import { ProfileComponent } from '../user/profile/profile.component';
import { SemakanComponent } from './semakan/semakan.component';
import { CheckMetadataComponent } from './check-metadata/check-metadata.component';
import { CheckstatusComponent } from './checkstatus/checkstatus.component';
import { DownloadComponent } from './download/download.component';
import { DataAppComponent } from './data-app/data-app.component';
import { ValuationComponent } from './valuation/valuation.component';


export const UserRoutes: Routes = [
    {
        path: '',
        children: [
            {
                path: 'dashboard',
                component: DashboardComponent
            },
            {
                path: 'metadata',
                component: MetadataComponent
            },
            {
                path: 'check-metadata',
                component: CheckMetadataComponent
            },
            {
                path: 'profile',
                component: ProfileComponent
            },
            {
                path: 'semakan',
                component: SemakanComponent
            },
            {
                path: 'tabledata',
                component: DatatableComponent
            },
            {
                path: 'checkstatus',
                component: CheckstatusComponent
            },
            {
                path: 'download',
                component: DownloadComponent
            },
            {
                path: 'data-app',
                component: DataAppComponent
            },
            {
                path: 'valuation',
                component: ValuationComponent
            },
        ]
    }
]