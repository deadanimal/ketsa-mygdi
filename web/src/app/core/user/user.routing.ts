import { DatatableComponent } from '../admin/datatable/datatable.component';
import { MetadataComponent } from './metadata/metadata.component';
import { Routes } from '@angular/router';
import { DashboardComponent } from './dashboard/dashboard.component';
import { ProfileComponent } from '../admin/profile/profile.component';
import { SemakanComponent } from './semakan/semakan.component';


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
            }
        ]
    }
]