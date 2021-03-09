import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ManagementNewappComponent } from './management-newapp.component';

describe('ManagementNewappComponent', () => {
  let component: ManagementNewappComponent;
  let fixture: ComponentFixture<ManagementNewappComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ManagementNewappComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ManagementNewappComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
