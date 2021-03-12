import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DataAsasComponent } from './data-asas.component';

describe('DataAsasComponent', () => {
  let component: DataAsasComponent;
  let fixture: ComponentFixture<DataAsasComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DataAsasComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DataAsasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
