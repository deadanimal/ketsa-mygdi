import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ManagementDisclaimerComponent } from './management-disclaimer.component';

describe('ManagementDisclaimerComponent', () => {
  let component: ManagementDisclaimerComponent;
  let fixture: ComponentFixture<ManagementDisclaimerComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ManagementDisclaimerComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ManagementDisclaimerComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
