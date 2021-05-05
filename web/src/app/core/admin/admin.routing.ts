import { ClassSharecategoryComponent } from './management-updatedata/class-sharecategory/class-sharecategory.component';
import { ClassCategoryComponent } from './management-updatedata/class-category/class-category.component';
import { DatalistComponent } from './management-updatedata/datalist/datalist.component';
import { ManagementElementmetadataComponent } from './management-elementmetadata/management-elementmetadata.component';
import { ManagementNewappComponent } from './management-newapp/management-newapp.component';
import { ManagementAppstatusComponent } from './management-appstatus/management-appstatus.component';
import { ManagementProcessdataComponent } from './management-processdata/management-processdata.component';
import { ManagementAnnoucementComponent } from './management-annoucement/management-annoucement.component';
import { DatatableComponent } from './datatable/datatable.component';
import { Routes } from '@angular/router';
import { DashboardComponent } from './dashboard/dashboard.component';
import { ManagementUserComponent } from './management-user/management-user.component';
import { ReportComponent } from './report/report.component';
import { ManagementFaqComponent } from './management-faq/management-faq.component';
import { ManagementUserguideComponent } from './management-userguide/management-userguide.component';
import { ProfileComponent } from './profile/profile.component';
import { FeedbackComponent } from './feedback/feedback.component';
import { ValuationComponent } from './valuation/valuation.component';
import { DatapriceComponent } from './management-updatedata/dataprice/dataprice.component';
import { ManagementAcceptuserComponent } from './management-acceptuser/management-acceptuser.component';


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
                        path: 'user',
                        component: ManagementUserComponent
                    },
                    {
                        path: 'accept-user',
                        component: ManagementAcceptuserComponent
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
                    },
                    {
                        path: 'valuation',
                        component: ValuationComponent
                    }, {
                        path: 'dataasas',
                        children: [
                            {
                                path: 'datalist',
                                component: DatalistComponent
                            },
                            {
                                path: 'class-category',
                                component: ClassCategoryComponent
                            },
                            {
                                path: 'class-sharecategory',
                                component: ClassSharecategoryComponent
                            },
                            {
                                path: 'dataprice',
                                component: DatapriceComponent
                            }
                        ]
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